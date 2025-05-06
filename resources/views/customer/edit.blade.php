@extends('./template.layouts')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="">
                <div class="row justify-content-center mt-2">
                <div class="col-md-11">
                    <div class="card">
                        <div class="card-header">Update Data Customer</div>
                        <div class="card-body">
                            <form action="{{ route('customer_update_proses', $post->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="mb-3 row">
                                    <label for="sales_number" class="col-md-4 col-form-label text-md-end text-start">ID Customer</label>
                                    <div class="col-md-6">
                                        <input type="sales_number" class="form-control @error('sales_number') is-invalid @enderror" id="sales_number" name="sales_number" value="{{ old('sales_number', $post->sales_number) }}">
                                        @if ($errors->has('sales_number'))
                                            <span class="text-danger">{{ $errors->first('sales_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="customer" class="col-md-4 col-form-label text-md-end text-start">Nama Perusahaan</label>
                                    <div class="col-md-6">
                                        <input type="customer" class="form-control @error('customer') is-invalid @enderror" id="customer" name="customer" value="{{ old('customer', $post->customer) }}">
                                        @if ($errors->has('customer'))
                                            <span class="text-danger">{{ $errors->first('customer') }}</span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <label for="created_by" class="col-md-4 col-form-label text-md-end text-start">Submit By</label>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" id="created_by" name="created_by" value="{{ session()->get('fullname') }}" readonly>
                                    </div>
                                </div>
                                
                                <div class="mb-3 row">
                                    <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                                    <a href="/customer" class="col-md-3 offset-md-0 ml-2 btn btn-warning">Cancel</a>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
            
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    
@endsection