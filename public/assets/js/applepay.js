/*
Copyright (C) 2016 Apple Inc. All Rights Reserved.
See LICENSE.txt for this sample’s licensing information
 
Abstract:
A helper function that requests an Apple Pay merchant session using a promise.
*/
 
function getApplePaySession(url) {
    return new Promise(function (resolve, reject) {
      var xhr = new XMLHttpRequest();
      xhr.open('POST', applePaySessionUrl);
      xhr.onload = function () {
        if (this.status >= 200 && this.status < 300) {
          resolve(JSON.parse(xhr.response));
        } else {
          reject({
            status: this.status,
            statusText: xhr.statusText
          });
        }
      };
      xhr.onerror = function () {
        reject({
          status: this.status,
          statusText: xhr.statusText
        });
      };
      xhr.setRequestHeader("Content-Type", "application/json");
      xhr.send(JSON.stringify({url: url}));
    });
  }
  
  /*
  Copyright (C) 2016 Apple Inc. All Rights Reserved.
  See LICENSE.txt for this sample’s licensing information
   
  Abstract:
  The main client-side JS. Handles displaying the Apple Pay button and requesting a payment.
  */
   
  /**
  * This method is called when the page is loaded.
  * We use it to show the Apple Pay button as appropriate.
  * Here we're using the ApplePaySession.canMakePayments() method,
  * which performs a basic hardware check. 
  *
  * If we wanted more fine-grained control, we could use
  * ApplePaySession.canMakePaymentsWithActiveCards() instead.
  */
  document.addEventListener('DOMContentLoaded', () => {
      if (window.ApplePaySession) {
          if (ApplePaySession.canMakePayments) {
              showApplePayButton();
          }
      }
  });
  
  function showApplePayButton() {
      return false;
      HTMLCollection.prototype[Symbol.iterator] = Array.prototype[Symbol.iterator];
      const buttons = document.getElementsByClassName("apple-pay-button");
      for (let button of buttons) {
          button.className += " visible";
      }
  }
   
   
  /**
  * Apple Pay Logic
  * Our entry point for Apple Pay interactions.
  * Triggered when the Apple Pay button is pressed
  */
  function applePayButtonClicked() {
      const paymentRequest = {
          countryCode: 'RU',
          currencyCode: 'RUB',
  
          lineItems: applePayLineItems,
          total: applePayTotal,
   
          supportedNetworks: ['masterCard', 'visa'],
          merchantCapabilities: ['supports3DS'],
      };
   
      const session = new ApplePaySession(1, paymentRequest);
      
      /**
      * Merchant Validation
      * We call our merchant session endpoint, passing the URL to use
      */
      session.onvalidatemerchant = (event) => {
          // console.log("Validate merchant");
          const validationURL = event.validationURL;
          getApplePaySession(event.validationURL).then(function(response) {
              // console.log(response);
              session.completeMerchantValidation(response);
          });
      };
   
      /**
      * Payment Authorization
      * Here you receive the encrypted payment data. You would then send it
      * on to your payment provider for processing, and return an appropriate
      * status in session.completePayment()
      */
      session.onpaymentauthorized = (event) => {
          // Send payment for processing...
          const payment = event.payment;
  
          return new Promise(function (resolve, reject) {
              var xhr = new XMLHttpRequest();
              xhr.open('POST', applePayPaymentUrl);
              xhr.onload = function () {
                  if (this.status >= 200 && this.status < 300) {
                      resolve(JSON.parse(xhr.response));
  
                      session.completePayment(ApplePaySession.STATUS_SUCCESS);
                      window.location.href = applePaySuccessUrl;
                  } else {
                      reject({
                          status: this.status,
                          statusText: xhr.statusText
                      });
  
                      session.completePayment(ApplePaySession.STATUS_FAILURE);
                      window.location.href = applePayFailureUrl;
                  }
              };
              xhr.onerror = function () {
                  reject({
                      status: this.status,
                      statusText: xhr.statusText
                  });
  
                  session.completePayment(ApplePaySession.STATUS_FAILURE);
                  window.location.href = applePayFailureUrl;
              };
              xhr.setRequestHeader("Content-Type", "application/json");
              xhr.send(JSON.stringify({payment: payment}));
          });
      }
   
      // All our handlers are setup - start the Apple Pay payment
      session.begin();
  }
  
  $(function() {
      $('.apple-pay-button').on('click', function() {
          applePayButtonClicked();
      });
  });