@extends('./layouts.admin_layout')
@section('contents')
    <div class="col-lg-12">

        <section class="panel">
            <header class="panel-heading">
                Chỉnh Sửa Sản Phẩm
            </header>

            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{url('admin/capnhatsp/'.$edit->MA_SP)}}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản Phẩm</label>
                            <input type="text" class="form-control" name="ten_sp" value="{{$edit->TEN_SP}}" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="file_ansp" class="form-label">Chọn Avata sản phẩm</label>
                            <input type="file" id="avata" name="avata_sp" class="form-control">
                            <img id="image-preview" src="{{asset($edit->AVATA_SP)}}" style="max-width: 100%; max-height: 200px;">
                            {{-- kết thúc sự kiện hiển thị avata hình ảnh --}}

                            
                            <script>
                                document.getElementById("avata").addEventListener("change", function() {
                                    let preview = document.getElementById("preview");
                                    let file = this.files[0];
                                    let reader = new FileReader();

                                    reader.onloadend = function() {
                                        preview.src = reader.result;
                                        preview.style.display = "block";
                                    }

                                    if (file) {
                                        reader.readAsDataURL(file);
                                    } else {
                                        preview.src = "";
                                    }
                                });
                            </script>
                            {{-- kết thúc sự kiện hiển thị avata hình ảnh --}}
                        </div>


                        <div class="form-group">
                            <label for="file_ansp" class="form-label">Chọn Ảnh Sản Phẩm</label>
                            <input type="file" name="file_anhsp[]" id="image-input" multiple>
                            <div id="image-preview"></div>

                            <style>
                                #image-preview {
                                    display: flex;
                                    flex-wrap: wrap;
                                }

                                .image-container {
                                    position: relative;
                                    margin: 10px;
                                }

                                .image-container img {
                                    width: 100px;
                                    height: 100px;
                                    object-fit: cover;
                                }

                                .image-container .delete-button {
                                    position: absolute;
                                    top: 5px;
                                    right: 5px;
                                    background-color: white;
                                    border: none;
                                    border-radius: 50%;
                                    width: 20px;
                                    height: 20px;
                                    cursor: pointer;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }
                            </style>

                            <script>
                                const imageInput = document.getElementById('image-input');
                                const imagePreview = document.getElementById('image-preview');

                                imageInput.addEventListener('change', (e) => {
                                    const files = e.target.files;
                                    for (let i = 0; i < files.length; i++) {
                                        const file = files[i];
                                        const reader = new FileReader();
                                        reader.readAsDataURL(file);
                                        reader.onload = () => {
                                            const img = document.createElement('img');
                                            img.src = reader.result;
                                            const deleteButton = document.createElement('button');
                                            deleteButton.innerText = 'x';
                                            deleteButton.classList.add('delete-button');
                                            const imageContainer = document.createElement('div');
                                            imageContainer.classList.add('image-container');
                                            imageContainer.appendChild(img);
                                            imageContainer.appendChild(deleteButton);
                                            imagePreview.appendChild(imageContainer);
                                            deleteButton.addEventListener('click', () => {
                                                imagePreview.removeChild(imageContainer);
                                            });
                                        }
                                    }
                                });
                            </script>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Mô Tả Sản Phẩm</label>
                            <textarea id="description" maxlength="5000" name="mota_sp" rows="15" style="max-width: 100%;" class="form-control">
                            {{$edit->MOTA_SP}}
                            </textarea>
                            <p id="character-count" style="float: right;">0/5000</p>
                        </div>

                        <script>
                            const textarea = document.getElementById("description");
                            const countDisplay = document.getElementById("character-count");

                            textarea.addEventListener("input", function() {
                                const charactersEntered = textarea.value.length;
                                countDisplay.innerHTML = charactersEntered + "/5000";
                            });
                        </script>
                        <style>
                            select option {
                                background-color: #fec79f;
                                color: white;
                            }

                            select option:checked {
                                background-color: #664b78;
                                color: white;
                            }
                        </style>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thương Hiệu</label>
                            <select class="form-control m-bot15" id="first-select_th" name="thuonghieu"
                                style="color: #f6402d; font-weight: bold;">
                                <option value="datgold_th"> Chọn Thương Hiệu</option>
                                @foreach ($data_th as $option_th)
                                    <option value="{{ $option_th->MA_TH }}">{{ $option_th->TEN_TH }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sản Phẩm Thuộc Ngành Hàng</label>
                            <select class="form-control m-bot15" id="first-select" name="nganhhang"
                                style="color: blue; font-weight: bold;">
                                <option value="datgold"> Chọn Ngành Hàng</option>
                                @foreach ($data_nh as $option)
                                    @if ($option->NH_CON == null)
                                        <option value="{{ $option->MA_NH }}">{{ $option->TEN_NH }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <!-- <label for="exampleInputEmail1">Danh Mục Nằm Trong Ngành Hàng</label> -->
                            <select class="form-control m-bot15" id="second-select" name="nganhhangcon"
                                style="display:none; color: #f6402d; font-weight: bold;">
                                <option value="">Chọn Mặt Hàng</option>
                                @foreach ($data_nh as $option)
                                    @if ($option->NH_CON != null)
                                        <option value="{{ $option->NH_CON }}">{{ $option->TEN_NH }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>


                        <section>
                            <h3 style="margin-bottom: 17px; color: #999999;" id="chitiet">Thông Tin Chi Tiết</h3>
                            <p style="color: #999999; font-size: 12px; display: block;" id="goiy">Có Thể Điều Chỉnh Sau
                                Khi Chọn Ngành Hàng</p>

                            <div class="form-group">
                                <style>
                                    table tr td {
                                        color: black !important;
                                        font-weight: bold;
                                    }

                                    table tr td select {
                                        color: #007acc !important;
                                        font-weight: bold;
                                    }
                                </style>
                                <table class="table table-active ">
                                    <thead>

                                    </thead>

                                    <tbody>
                                        @foreach ($data_ttct as $ttct)
                                            <tr class="ttct" data-value="{{ $ttct->MA_NH }}" style="display: none;">
                                                <td> <input type="text" name='tenttct' disabled
                                                        value="{{ $ttct->TEN_TTCT }}"></td>
                                                <td>
                                                    <?php $array = explode(',', $ttct->NOIDUNG_OPTION); ?>
                                                    <select id="thongtinchitiet" name="ttct">
                                                        @foreach ($array as $item)
                                                            <option value="{{ $item }}">{{ $item }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>

                        </section>

                        <!-- javascript cho phần chọn để hiển thị nội dung -->

                        <script>
                            document.getElementById("first-select").addEventListener("change", function() {
                                var selectedOption = this.options[this.selectedIndex].value;
                                var ttcts = document.getElementsByClassName("ttct");
                                var chitiet = document.getElementById("chitiet");
                                var goiy = document.getElementById("goiy");

                                for (var i = 0; i < ttcts.length; i++) {
                                    var ttct = ttcts[i];
                                    if (ttct.getAttribute("data-value") === selectedOption) {
                                        ttct.style.display = "block";
                                        chitiet.style.color = "black";
                                        goiy.style.display = "block";

                                    } else {
                                        ttct.style.display = "none";
                                        goiy.style.display = "none";
                                    }
                                }
                            });
                        </script>
                        <script>
                            document.getElementById("first-select").addEventListener("change", function() {
                                var selectedOption = this.options[this.selectedIndex].value;
                                var secondSelect = document.getElementById("second-select");

                                var options = secondSelect.querySelectorAll("option");

                                for (var i = 0; i < options.length; i++) {
                                    if (options[i].value.startsWith(selectedOption)) {
                                        options[i].style.display = "block";


                                    } else {
                                        options[i].style.display = "none";

                                    }
                                }


                                if (selectedOption === "datgold") {
                                    secondSelect.style.display = "none";

                                } else {
                                    secondSelect.style.display = "block";

                                }
                            });
                        </script>

                        

                        <div class="form-group-inline text-center" style="display: inline; " id="giasp" >

                            <table style="margin-bottom: 18px" >
                                <thead>
                                    <th>Giá Sản Phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Đơn Vị Tính</th>
                                    <th>Thể Loại</th>
                                </thead>
                                <tbody>
                                    <tr >
                                        <td>
                                            <input type="text" id="price" name="gia_sp" value="{{$edit->GIA_SP}}" style="max-width: 100px; margin-right: 27px;"
                                            class="form-control" >
                                        </td>
                                        <td>
                                            <input type="number" min="1" id="sl" name="sl_sp" value="{{$edit->SL_SP}}" style="max-width: 86px;margin-right: 27px;"
                                            class="form-control">
                                    
                                        </td>
                                        <td>
                                            <input type="text" name="dvt" id="sl" value="{{$edit->DVT}}" style="max-width: 86px;margin-right: 47px;"
                                            class="form-control ">
                                        </td>
                                        <td>
                                            
                                            <div class="form-check-inline " style="margin-left: 10px; float: left;">
                                                <input class="form-check-input form-control-lg " type="radio" value="1" name="the_loai" id="the_loai" >
                                                <label class="form-check-label" for="the_loai">
                                                  Sản Phẩm Nổi Bật
                                                </label>
                                              </div>
                                              <div class="form-check-inline">
                                                <input class="form-check-input" type="radio" value="0" name="the_loai" id="the_loai" >
                                                <label class="form-check-label" for="the_loai">
                                                  Sản Phẩm Mới
                                                </label>
                                              </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        
                           
                            {{-- đoạn script để format tiền việt nam --}}
                            <script>
                                function number_format(number, decimals, decPoint, thousandsSep) {
                                    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
                                    var n = !isFinite(+number) ? 0 : +number
                                    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
                                    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
                                    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
                                    var s = ''

                                    var toFixedFix = function(n, prec) {
                                        var k = Math.pow(10, prec)
                                        return '' + (Math.round(n * k) / k)
                                            .toFixed(prec)
                                    }

                                    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
                                    if (s[0].length > 3) {
                                        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
                                    }
                                    if ((s[1] || '').length < prec) {
                                        s[1] = s[1] || ''
                                        s[1] += new Array(prec - s[1].length + 1).join('0')
                                    }

                                    return s.join(dec)
                                }

                                function formatVND(price) {
                                    return number_format(price, 0, '.', ',');
                                }

                                document.getElementById("price").addEventListener("keyup", function() {
                                    this.value = formatVND(this.value);
                                });
                            </script>
                            {{-- Kết thúc script để format tiền việt nam --}}
                     
              
                        </div>
                      
                       
                            <div class="text-center">
                                
                                <button type="submit" class="btn btn-info ">Cập Nhật Sản Phẩm</button>
                            </div>    

                    </form>
                </div>

            </div>
        </section>

    </div>
@endsection
