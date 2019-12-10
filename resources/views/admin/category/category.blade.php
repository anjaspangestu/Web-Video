@extends('welcome')

@section('title', 'Kategori')

@section('css')

@endsection

@section('content')

  <div class="container-fluid upload-details">
    <div class="row">
      <div class="col-sm-12 col-md-12 sl-mb20">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
          Tambah Kategori
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h3 id="title">Tambah Kategori</h3>
              </div>
              <form class="" id="form" onsubmit="return false">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="" id="product-id">
                <div class="modal-body">
                  <div class="form-group">
                    <label for="name_product">Nama</label>
                    <input type="text" name="name_product" class="form-control" id="name_product">
                  </div>
                  <div class="form-group" style="width:200px;height:200px;">
                    <div class="slim-content">
                      <div class="slim circle photo-container" {{-- data-label="upload image here" --}}
                        data-size="230,230" {{-- Ukuran Gambar--}}
                        data-ratio="1:1"
                        data-jpeg-compression="80"
                        data-status-upload-success="berhasil disimpan"
                        data-force-type="jpg" id="product-image">
                        <input type="file" name="image[]" required />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" onclick="saveItem(this)">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>


      <div class="col-sm-12">
        <table class="responsive-table" id="table">
          <thead>
              <tr>
                <td>No</td>
                <td>Kategori</td>
                <td>Action</td>
              </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>

            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

@endsection

@section('js')

@endsection
