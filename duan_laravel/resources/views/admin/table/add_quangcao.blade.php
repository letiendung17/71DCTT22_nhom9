@extends('./layouts.admin_layout')
@section('contents')
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Quảng Cáo
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ URL::TO('/admin/add-quangcao') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="file_ansp" class="form-label">Chọn Ảnh Quảng Cáo</label>
                            <input type="file" id="avata" name="anh_qc" class="form-control">

                            <img id="preview" style="display:none; width:200px;">
                            {{-- sự kiện hiển thị hình ảnh avata --}}
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
                            <label for="exampleInputEmail1">Link Quảng Cáo</label>
                            <input type="text" class="form-control" name="link_qc" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-check-inline" style="float: left; margin-right: 15px; color:#f6412d ;">
                            <input class="form-check-inline" type="radio" name="datqc" value="0"
                                id="flexRadioDefault1">
                            <label class="form-check-inline" for="flexRadioDefault1">
                                Đặt Ở Phần Slide Bên trái
                            </label>
                        </div>
                        <div class="form-check-inline " style="margin-bottom: 15px; color: #3ad2ff;">
                            <input class="form-check-inline" type="radio" name="datqc" id="flexRadioDefault2"
                                value="1">
                            <label class="form-check-inline" for="flexRadioDefault2">
                                Đặt ở bên phải
                            </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời Gian Hết Hạn Quảng Cáo</label>
                            <input type="date" class="form-control" name="thoigian" id="exampleInputEmail1"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chọn Thương Hiệu Quảng Cáo</label>
                            <select class="form-control m-bot15" name="thuonghieu"
                                style="color: #72537d; font-weight: bold;">
                                <option value="">Quảng Cáo Cho Thương Hiệu Nào?</option>
                                @foreach ($data_th as $option_th)
                                    <option value="{{ $option_th->MA_TH }}">{{ $option_th->TEN_TH }}</option>
                                @endforeach
                            </select>

                        </div>


                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
@endsection
