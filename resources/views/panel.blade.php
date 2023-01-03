@extends('layouts.base')
@section('content')
    <div class="page-wrapper">
        <div class="page-content">
          <h5>hi</h5>
        </div>
    </div>
@endsection

@section('script_ajax')
    <script>
       
        
    </script>

@endsection

@section('script_table')   
 <script>

 </script>
@endsection

@section('script_table_ajax')
    <script>
    </script>
@endsection

@section('script_select2')
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
@endsection




