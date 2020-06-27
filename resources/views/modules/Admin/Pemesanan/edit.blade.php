@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{$title}}</div>
            <div class="card-body">
                <form action="{{route('admin.pemesanan.create')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Pekerjaan</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="20">
                            {{$model->deskripsi}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control">
                            {{$model->alamat}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#deskripsi',
        branding: false,
        plugins: 'advlist autolink lists link charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    })
</script>
@endpush