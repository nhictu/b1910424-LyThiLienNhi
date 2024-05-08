@extends('app')
@section('content')

    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Sản Phẩm</h3>
    <div class="table-data__tool">
        <div class="table-data__tool-left">
            {{-- <div class="rs-select2--light rs-select2--md">
                <select class="js-select2" name="property">
                    <option selected="selected">All Properties</option>
                    <option value="">Option 1</option>
                    <option value="">Option 2</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <div class="rs-select2--light rs-select2--sm">
                <select class="js-select2" name="time">
                    <option selected="selected">Today</option>
                    <option value="">3 Days</option>
                    <option value="">1 Week</option>
                </select>
                <div class="dropDownSelect2"></div>
            </div>
            <button class="au-btn-filter">
                <i class="zmdi zmdi-filter-list"></i>filters</button> --}}
        </div>
        <div class="table-data__tool-right">
            <a href="products/create" class="btn btn-primary"><i class="zmdi zmdi-plus"></i> Thêm mới</a>
            {{-- <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                <a href="productsExport" class="btn btn-success"><i class="fa fa-download"></i> Xuất Excel</a>
            </div> --}}
        </div>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Đơn vị tính</th>
                    <th>Đơn giá nhập</th>
                    <th>Đơn giá bán</th>
                    <th>Thông tin xuất xứ sản phẩm</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($data) && $data->count())
                    @foreach ($data as $prd)
                        <tr class="tr-shadow">

                            <td>
                                <span>{{ $prd->prd_id }}</span>
                            </td>
                            <td class="desc">{{ $prd->prd_name }}</td>
                            <td><span>{{ $prd->prd_unit }}</span></td>
                            <td>{{ number_format($prd->prd_inputprice) . ' VND' }}</td>
                            {{-- <td>
                                                <span class="status--process">Processed</span>
                                            </td> --}}
                            <td>{{ number_format($prd->prd_saleprice) . ' VND' }}</td>
                            <td>{{ $prd->prd_desc }}</td>


                            <td>
                                <form action="{{ url('/products/' . $prd->prd_id) }}" method="POST">
                                    <div class="table-data-feature">
                                        <a href="{{ url('/products/' . $prd->prd_id . '/edit') }}" class="item"
                                            data-toggle="tooltip" data-placement="top" title="Sửa">
                                            <i class="zmdi zmdi-edit"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Xóa"
                                            onclick="return confirm(&quot;Bạn thật sự muốn xóa sản phẩm này?&quot;)">
                                            <i type="submit" class="zmdi zmdi-delete"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="7">Không có dữ liệu.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <br>
    <div class="row">{{ $data->appends(request()->all())->links() }}</div>
    <!-- END DATA TABLE -->

@endsection
