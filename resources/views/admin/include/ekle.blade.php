@extends("admin.tema")
@section("admintitle") Hasan Akoluk Admin Panel @endsection
@section("css")
<link href="{{asset('admin')}}/plugins/summernote/dist/summernote.css" rel="stylesheet">
@endsection

@section("home")
   <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

           

            <div class="container-fluid">
                  <div class="row">
                  <div class="col-lg-12">
                  @if(session('basarili'))
            <div class="alert alert-success">{{session('basarili')}}</div>
                  @endif
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">{{$modulBilgisi->baslik}}</h4>
                                <p class="text-muted m-b-15 f-s-12">Use the input classes on an <code>.input-default, input-flat, .input-rounded</code> for Default input.</p>
                                <div class="basic-form">
                                    <form action="{{route('eklepost',$modulBilgisi->seflink)}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label>Kategori</label>
                                               <select class="form-control input-default"  name="kategori">
                                                   @if($kategoriBilgisi)
                                                   @foreach($kategoriBilgisi as $kategori)
                                                   <option value="{{$kategori->id}}">{{stripslashes($kategori->baslik)}}</option>
                                                   @endforeach
                                                   @endif
                                               </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input type="text" class="form-control input-default" placeholder="Başlık" name="baslik" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea name="metin" class="summernote">

                                     
                                            </textarea>
                                        </div>
                                      
                                        <div class="form-group">
                                        <div class="form-group">
                                            <label>Resim Seç</label>
                                            <input type="file" class="form-control input-default" placeholder="Başlık" name="resim">
                                        </div>
                                            <label>anahtar</label>
                                            <input type="text" class="form-control input-default" placeholder="Başlık" name="anahtar">
                                        </div>
                                        <div class="form-group">
                                            <label>description</label>
                                            <input type="text" class="form-control input-default" placeholder="Başlık" name="description">
                                        </div>
                                        <div class="form-group">
                                            <label>Sıra No</label>
                                            <input type="text" class="form-control input-default" placeholder="Sıra No" name="sirano" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn btn-primary"  name="gonder" value="kaydet">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection

@section("js")
<script src="{{asset('admin')}}/plugins/summernote/dist/summernote.min.js"></script>
    <script src="{{asset('admin')}}/plugins/summernote/dist/summernote-init.js"></script>
@endsection