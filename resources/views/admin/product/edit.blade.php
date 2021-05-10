<x-app-layout>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif

    @if (\Session::has('error'))
    <div class="alert alert-error">
        <ul>
            <li>{!! \Session::get('error') !!}</li>
        </ul>
    </div>
    @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight mt-16">
            Товары -- Редактирование
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{route('products.update', $current_product->id)}}">
                        @csrf
                        @method('patch')

                        <div x-data="{openTab: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="my-6">
                            <ul class="flex border-b">
                                @foreach($lang_field_sets as $lang_field_set)

                                <li @click="openTab = {{$loop->index + 1}}" :class="{ '-mb-px': openTab === {{$loop->index + 1}} }" class="-mb-px mr-1">
                                    <span :class="openTab === {{$loop->index + 1}} ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                        {{$lang_field_set->lang}}
                                    </span>
                                </li>

                                @endforeach
                            </ul>
                            <div class="w-full pt-4">
                                @foreach($lang_field_sets as $lang_field_set)
                                <div x-show="openTab === {{$loop->index + 1}}">
                                    <label class="mt-5">Наименование -- {{$lang_field_set->lang}}</label>
                                    <input type="text" class="form-control" placeholder="{{__('adminpanel.name')}}" name="localization[{{$lang_field_set->lang}}][title]" class="@error('title') is-invalid @enderror" value="{{$lang_field_set->title}}">
                                    <br>
                                    <label class="mt-4">Описание -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="content-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][content]">{{$lang_field_set->content}}</textarea>
                                    <label class="mt-4">Детали -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="details-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][details]">{{$lang_field_set->details}}</textarea>
                                    <label class="mt-5">Уход -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="care-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][care]">{{$lang_field_set->care}}</textarea>
                                    <label class="mt-5">Таблица размеров -- {{$lang_field_set->lang}}</label>
                                    <textarea class="form-control pt-4" id="size_table-{{$lang_field_set->lang}}" name="localization[{{$lang_field_set->lang}}][size_table]">{{$lang_field_set->size_table}}</textarea>
                                </div>
                                @endforeach
                            </div>

                        </div>
                        <label>{{__('adminpanel.categories_for_product')}}</label>
                        @if($choosed_categories->count() > 0)
                        @foreach($categories as $category)
                        @if($choosed_categories->contains($category))
                        {{ $category->getLocalizeTitleRu() }} --- <input type="checkbox" name="choosed_categories[]" value="{{$category->id}}" checked>
                        @else
                        {{ $category->getLocalizeTitleRu() }} --- <input type="checkbox" name="choosed_categories[]" value="{{$category->id}}">
                        @endif
                        @endforeach
                        @else
                        @foreach($categories as $category)
                        {{ $category->getLocalizeTitleRu() }} --- <input type="checkbox" name="choosed_categories[]" value="{{$category->id}}">
                        @endforeach
                        @endif

                        <div x-data="{openTabColor: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="my-6">
                            <ul class="flex border-b">
                                @foreach($current_product->colorVariations as $colorVariation)
                                <li @click="openTabColor = {{$loop->index + 1}}" :class="{ '-mb-px': openTabColor === {{$loop->index + 1}} }" class="-mb-px mr-1">
                                    <span :class="openTabColor === {{$loop->index + 1}} ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                        {{$colorVariation->color->getLocalizeTitleRu()}}
                                    </span>
                                </li>
                                @endforeach
                            </ul>
                            <div class="w-full pt-4">
                                @foreach($current_product->colorVariations as $colorVariation)
                                <div x-show="openTabColor === {{$loop->index + 1}}">

                                    <div x-data="{openTabColorVariationTabs: 1 ,activeClasses: 'border-l border-t border-r rounded-t text-blue-700',inactiveClasses: 'text-blue-500 hover:text-blue-800'}" class="my-6">
                                        <ul class="flex border-b">

                                            <li @click="openTabColorVariationTabs = 1" :class="{ '-mb-px': openTabColorVariationTabs === 1 }" class="-mb-px mr-1">
                                                <span :class="openTabColorVariationTabs === 1 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                                    Настройка главного изображения
                                                </span>
                                            </li>
                                            <li @click="openTabColorVariationTabs = 2" :class="{ '-mb-px': openTabColorVariationTabs === 2 }" class="-mb-px mr-1">
                                                <span :class="openTabColorVariationTabs === 2 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                                    Настройка галереи изображений
                                                </span>
                                            </li>
                                            <li @click="openTabColorVariationTabs = 3" :class="{ '-mb-px': openTabColorVariationTabs === 3 }" class="-mb-px mr-1">
                                                <span :class="openTabColorVariationTabs === 3 ? activeClasses : inactiveClasses" class="bg-white inline-block py-2 px-4 font-semibold cursor-pointer">
                                                    Остатки по размерам (установка скидок на размеры)
                                                </span>
                                            </li>

                                        </ul>
                                        <div class="w-full pt-4">
                                            <div x-show="openTabColorVariationTabs === 1">
                                                {{$colorVariation->color->getLocalizeTitleRu()}} -- <input type="color" name="hex" value="{{$colorVariation->color->hex}}" disabled>-- <a href="{{route('colors.edit', $colorVariation->color->id)}}" class="underline" target="_blank">Редактировать параметры цвета</a>

                                                <h5>Главное изображение товара</h5>
                                                <input type="file" class="filepond my-4" name="filepond-image-{{$colorVariation->color->slug}}" data-allow-reorder="true" data-max-file-size="3MB">

                                                <div class="form-group">

                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label class="label" data-toggle="tooltip" title="" data-original-title="Кликните для загрузки основного изображения товара">
                                                                <img class="rounded" id="avatar_{{$colorVariation->color->slug}}" src="{{asset('icons/add_img.png')}}" alt="avatar">
                                                                <input type="file" class="sr-only" id="input_{{$colorVariation->color->slug}}" name="image" accept="image/*">
                                                            </label>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5>Главное изображение товара</h5>
                                                        </div>
                                                    </div>


                                                    <div class="modal fade" id="modal_{{$colorVariation->color->slug}}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="modalLabel">Выберите учаток изображения для
                                                                        загрузки</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Колесом мыши менять масштаб<br> для выбора участка загружаемого
                                                                        изображения, перетаскивайте активную зону</p>
                                                                    <div class="img-container">
                                                                        <img id="image_{{$colorVariation->color->slug}}" src="">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                                                                    <button type="button" class="btn btn-primary" id="crop">Загрузить</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <input type="hidden" autocomplete="OFF" name="main_image" id="main_image" placeholder="" class="form-control input-sm" value="{{$colorVariation->main_img}}" />
                                                </div>

                                                <script>
                                                    //главное изображение
                                                    window.addEventListener('DOMContentLoaded', function() {
                                                        var avatar = document.getElementById('avatar_{{$colorVariation->color->slug}}');
                                                        console.log(avatar);
                                                        var image = document.getElementById('image_{{$colorVariation->color->slug}}');
                                                        console.log(image);
                                                        var input = document.getElementById('input_{{$colorVariation->color->slug}}');
                                                        console.log(input);
                                                        var $progress = $('.progress_{{$colorVariation->color->slug}}');
                                                        console.log($progress);
                                                        var $progressBar = $('.progress-bar_{{$colorVariation->color->slug}}');
                                                        console.log($progressBar);
                                                        var $alert = $('.alert_{{$colorVariation->color->slug}}');
                                                        var $modal = $('#modal_{{$colorVariation->color->slug}}');
                                                        var cropper;

                                                        $('[data-toggle="tooltip"]').tooltip();

                                                        if (input == null)
                                                            return

                                                        input.addEventListener('change', function(e) {
                                                            var files = e.target.files;
                                                            var done = function(url) {
                                                                input.value = '';
                                                                image.src = url;
                                                                $alert.hide();
                                                                $modal.modal('show');
                                                            };
                                                            var reader;
                                                            var file;
                                                            var url;

                                                            if (files && files.length > 0) {
                                                                file = files[0];

                                                                if (URL) {
                                                                    done(URL.createObjectURL(file));
                                                                } else if (FileReader) {
                                                                    reader = new FileReader();
                                                                    reader.onload = function(e) {
                                                                        done(reader.result);
                                                                    };
                                                                    reader.readAsDataURL(file);
                                                                }
                                                            }
                                                        });

                                                        $modal.on('shown.bs.modal', function() {
                                                            cropper = new Cropper(image, {
                                                                aspectRatio: 3 / 4,
                                                                viewMode: 2,
                                                            });
                                                        }).on('hidden.bs.modal', function() {
                                                            cropper.destroy();
                                                            cropper = null;
                                                        });

                                                        document.getElementById('crop').addEventListener('click', function() {
                                                            var initialAvatarURL;
                                                            var canvas;

                                                            $modal.modal('hide');

                                                            if (cropper) {
                                                                canvas = cropper.getCroppedCanvas({
                                                                    width: 1000,
                                                                    height: 1000,
                                                                });
                                                                initialAvatarURL = avatar.src;
                                                                avatar.src = canvas.toDataURL();
                                                                $progress.show();
                                                                $alert.removeClass('alert-success alert-warning');
                                                                canvas.toBlob(function(blob) {
                                                                    var formData = new FormData();

                                                                    formData.append('file', blob, 'avatar.jpg');
                                                                    $.ajax("{{url('/admin/image/upload')}}", {
                                                                        method: 'POST',
                                                                        data: formData,
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                        },
                                                                        processData: false,
                                                                        contentType: false,

                                                                        xhr: function() {
                                                                            var xhr = new XMLHttpRequest();

                                                                            xhr.upload.onprogress = function(e) {
                                                                                var percent = '0';
                                                                                var percentage = '0%';

                                                                                if (e.lengthComputable) {
                                                                                    percent = Math.round((e.loaded / e.total) * 100);
                                                                                    percentage = percent + '%';
                                                                                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                                                                                }
                                                                            };

                                                                            return xhr;
                                                                        },

                                                                        success: function(file, response) {
                                                                            $alert.show().addClass('alert-success').text('Upload success');
                                                                            console.log(response);
                                                                            $('#main_image_{{$colorVariation->color->slug}}').val(file);
                                                                        },

                                                                        error: function() {
                                                                            avatar.src = initialAvatarURL;
                                                                            $alert.show().addClass('alert-warning').text('Upload error');
                                                                        },

                                                                        complete: function() {
                                                                            $progress.hide();
                                                                        },
                                                                    });
                                                                });
                                                            }
                                                        });
                                                    });
                                                    //главное изображение
                                                </script>

                                            </div>
                                            <div x-show="openTabColorVariationTabs === 2">
                                                <h5>Галерея изображений</h5>

                                                <div class="form-group">
                                                    <input type="hidden" autocomplete="OFF" name="item_images_{{$colorVariation->color->slug}}" id="item_images_{{$colorVariation->color->slug}}" placeholder="" class="form-control input-sm" required />
                                                    <div class="dropzone" id="dropzone_{{$colorVariation->color->slug}}">
                                                        <div class="dz-message" data-dz-message><span>Переместите сюда файлы для загрузки (или
                                                                нажмите сюда и выберите их). Размер загружаемых фотографий должен быть не более 3 мб.</span></div>
                                                    </div>
                                                </div>
                                                <div class="row align-items-center">
                                                    <div class="col-md-10 owl-carousel owl-theme">
                                                        @foreach($colorVariation->images as $image)
                                                        <div class="col-md-12 imageContainer item">
                                                            <a data-index="0" data-fancybox="gallery1" href="{{asset($image->img_path)}}" style="display:block">
                                                                <img class="img-fluid delpath" delpath="{{asset($image->img_path)}}" src="{{asset($image->img_path)}}" alt="">

                                                            </a>

                                                            <div class="deleteImage btn btn-danger" onclick="deleteImagesAttached(event)" imageId="{{$image->id}}" colorVariationId="{{$colorVariation->id}}">Удалить
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                    <div class="col-md-2">
                                                        <div class="form-group">
                                                            <input type="hidden" autocomplete="OFF" name="item_images" id="item_images" placeholder="" class="form-control input-sm" />
                                                            <button type="button" class="btn btn-lg add-image-button" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus"></i></button>
                                                        </div>
                                                    </div>
                                                </div>

                                                <script>
                                                    Dropzone.autoDiscover = false;
                                                    var acceptedFileTypes = "image/*"; //dropzone requires this param be a comma separated list
                                                    // imageDataArray variable to set value in crud form
                                                    var imageDataArray = new Array;
                                                    var imageDataArrayVer = new Array;
                                                    // fileList variable to store current files index and name
                                                    var fileList = new Array;
                                                    var fileListVer = new Array;
                                                    var i = 0;
                                                    var iver = 0;
                                                    $(function() {
                                                        uploader = new Dropzone("#dropzone_{{$colorVariation->color->slug}}", {
                                                            url: "{{url('/admin/image/upload')}}",
                                                            paramName: "image",
                                                            params: {
                                                                'color_variation_id': '{{$colorVariation->id}}'
                                                            },
                                                            uploadMultiple: false,
                                                            acceptedFiles: "image/*",
                                                            headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            },
                                                            addRemoveLinks: true,
                                                            forceFallback: false,
                                                            maxFilesize: 3, // Set the maximum file size to 256 MB
                                                            parallelUploads: 100,
                                                        }); //end drop zone
                                                        uploader.on("success", function(file, response) {
                                                            imageDataArray.push(response)
                                                            fileList[i] = {
                                                                "serverFileName": response,
                                                                "fileName": file.name,
                                                                "fileId": i
                                                            };

                                                            i += 1;
                                                            $('#item_images_{{$colorVariation->color->slug}}').val(imageDataArray);
                                                        });
                                                        uploader.on("removedfile", function(file) {
                                                            var rmvFile = "";
                                                            for (var f = 0; f < fileList.length; f++) {
                                                                if (fileList[f].fileName == file.name) {
                                                                    // remove file from original array by database image name
                                                                    imageDataArray.splice(imageDataArray.indexOf(fileList[f].serverFileName), 1);
                                                                    $('#item_images_{{$colorVariation->color->slug}}').val(imageDataArray);
                                                                    // get removed database file name
                                                                    rmvFile = fileList[f].serverFileName;
                                                                    // get request to remove the uploaded file from server

                                                                    $.ajax({
                                                                        headers: {
                                                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                                        },
                                                                        url: "{{url('/admin/image/delete')}}",
                                                                        type: "post",
                                                                        data: {
                                                                            image: rmvFile,
                                                                            color_variation_id: '{{$colorVariation->id}}'
                                                                        },
                                                                        success: function(response) {}
                                                                    });

                                                                }
                                                            }

                                                        });
                                                    });
                                                </script>

                                            </div>
                                            <div x-show="openTabColorVariationTabs === 3">
                                                <ul>
                                                    @foreach($colorVariation->images as $image)
                                                    <li>{{$image->name}}</li>
                                                    @endforeach

                                                </ul>

                                                <table class="table" id="findTable">
                                                    <tbody>
                                                        @foreach($colorVariation->sizeVariations as $sizeVariation)
                                                        <tr class="sizeVariationBlock">
                                                            <th scope="row">{{$sizeVariation->size->getLocalizeTitleRu()}}</th>
                                                            <td>{{$sizeVariation->price}} р.</td>
                                                            <td>{{$sizeVariation->stock}} шт.</td>
                                                            <td class="currentDiscount">скидка @if(!$sizeVariation->discount) 0 @else {{$sizeVariation->discount}} @endif %</td>
                                                            <td>
                                                                <div class="input-group mb-3 discountBlock">
                                                                    <input type="number" min="0" max="100" step="0.1" class="form-control discount-sum" placeholder="Новая скидка">
                                                                    <button class="btn btn-primary" type="button"  onclick="editDiscount(event)" sizeVariationId="{{$sizeVariation->id}}">изменить</button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" value="{{__('adminpanel.update')}}">

                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                responsiveClass: true,
                nav: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    400: {
                        items: 2,
                        nav: false
                    },
                    800: {
                        items: 5,
                        nav: true,
                        loop: false
                    }
                }
            });
        });

        function deleteImagesAttached(event) {
            var imageId = $(event.target).attr('imageId');
            var colorVariationId = $(event.target).attr('colorVariationId');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('/admin/image/delete-from-gallery')}}",
                type: "post",
                data: {
                    image_id: imageId,
                },
                success: function(response) {
                    $(event.target).parent('.imageContainer').remove()
                }
            });
        }

        function editDiscount(event) {
            var sizeVariationId = $(event.target).attr('sizeVariationId');
            var discountValue = $(event.target).siblings(".discount-sum").val();
            console.log(discountValue)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{url('/admin/product/change-discount')}}",
                type: "post",
                data: {
                    id: sizeVariationId,
                    value: discountValue,
                },
                success: function(response) {
                    $(event.target).siblings(".discount-sum").val('');
                    $(event.target).closest('.sizeVariationBlock').find('.currentDiscount').text('скидка ' + discountValue + ' %');
                }
            });
        }
    </script>
</x-app-layout>