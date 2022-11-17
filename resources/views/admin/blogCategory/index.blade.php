@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('blog.category.create') }}" class="btn btn-primary">Create</a>
                            <table class="table table-borded">
                                <thead>
                                    <tr>
                                        <th>S.no</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($blogData as $key=>$item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->blog_cate }}</td>
                                            <td>
                                                <a href="{{ route('blog.category.edit', $item->id) }}"
                                                    class="btn btn-primary">Edit</a>

                                                    <form action="{{ route('blog.category.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>

                                                {{-- <a href="javascript:;" data-blog-id="{{ $item->id }}"
                                                    class="btn btn-danger delete-blog">Delete</a> --}}
                                            </td>


                                        </tr>
                                    @empty
                                        <p>No data found</p>
                                    @endforelse
                                </tbody>
                            </table>
                            {!! $blogData->links() !!}
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

        </div>
    </div>

    @section('js')
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#imageUpload').change(function(e) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imageShow').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(e.target.files['0']);
                });


                // $('.delete-blog').click(function(e) {
                //     // e.preventDefault();

                //     var blogId = $(this).data('blog-id');

                //     let token = '{{ csrf_token() }}';
                //     let url = '{{ route('blog.category.destroy', ':id') }}';
                //     url = url.replace(':id', blogId);

                //     Swal({
                //         title: "Are you sure?",
                //         text: "You will not be able to recover this data!",
                //         type: "warning",
                //         showCancelButton: true,
                //         confirmButtonColor: "#DD6B55",
                //         confirmButtonText: "Yes, delete it!",
                //         closeOnConfirm: false
                //     }, function() {
                //         $.ajax({
                //             url: url,
                //             type: 'POST',
                //             data: {
                //                 "_token": token,
                //                 "_method": 'DELETE',
                //             },
                //             success: function() {
                //                 Swal.fire('Deleted!', 'Blog category has been deleted.',
                //                     'success');
                //                 setTimeout(() => {
                //                     location.reload();
                //                 }, 2000);
                //             }
                //         });
                //     });
                // });

            });
        </script>
    @endsection

@endsection
