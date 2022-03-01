                                  <!-- form isian data -->
                                  <form action="/test/testaktivasi" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="row">
                                      <div class="col-sm-6">
                                        <div class="form-group {{$errors->has('status')?' has-error' : ''}}">
                                          <label for="exampleFormControlInput1">Status</label>
                                          <input name="status" type="text" class="form-control" id="exampleFormControlInput1" placeholder="1 = aktif, 0 = non aktif" value="{{old('status')}}">
                                          @if($errors->has('status'))
                                          <span class="help-block">{{$errors->first('status')}}</span>
                                          @endif
                                        </div>
                                      </div>
                                    </div>
                                  <!-- akhir form isian data -->