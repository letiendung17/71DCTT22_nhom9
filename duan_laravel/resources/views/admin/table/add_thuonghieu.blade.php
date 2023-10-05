@extends('./layouts.admin_layout')
@section('contents')
<div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Thương Hiệu
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thương Hiệu</label>
                                    <input type="text" class="form-control" name="thuonghieu" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Ảnh Thương Hiệu</label>
                                    <input type="file" id="exampleInputFile" name="anhthuonghieu">
                                    <!-- <p class="help-block">Example block-level help text here.</p> -->
                                </div>
                                <!-- <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div> -->
                                <!-- <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div> -->
                                <button type="submit" class="btn btn-info">Submit</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>

@endsection