<div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            

  
@foreach ($categories as $category)
{{-- {{ dd($category)}} --}}
                                <li><a href=" {{ route('category.post',$category->id) }} ">{{$category->name}}</a>
@endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>