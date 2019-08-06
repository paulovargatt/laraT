@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$channel->name}}</div>

                    <div class="card-body">
                        @if($channel->editable())
                            <form id="update-channel-form" action="{{route('channels.update', $channel->id)}}"
                                  method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                @endif
                                <div class="form-group row justify-content-center">
                                    <div class="channel-avatar">
                                        @if($channel->editable())
                                            <div onclick="document.getElementById('image').click()"
                                                 class="channel-avatar-overlay">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24"
                                                     viewBox="0 0 24 24">
                                                    <defs>
                                                        <path id="a" d="M24 24H0V0h24v24z"/>
                                                    </defs>
                                                    <clipPath id="b">
                                                        <use xlink:href="#a" overflow="visible"/>
                                                    </clipPath>
                                                    <path clip-path="url(#b)"
                                                          d="M3 4V1h2v3h3v2H5v3H3V6H0V4h3zm3 6V7h3V4h7l1.83 2H21c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H5c-1.1 0-2-.9-2-2V10h3zm7 9c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-3.2-5c0 1.77 1.43 3.2 3.2 3.2s3.2-1.43 3.2-3.2-1.43-3.2-3.2-3.2-3.2 1.43-3.2 3.2z"/>
                                                </svg>
                                            </div>
                                        @endif
                                        <img src="{{$channel->image()}}" alt="">
                                    </div>
                                </div>

                                @if(!$channel->editable())
                                    <div class="form-group">
                                        <h4 class="text-center">{{$channel->name}}</h4>
                                        <p class="text-center">
                                            {{$channel->description}}
                                        </p>
                                    </div>
                                    @endif

                                <div class="text-center">
                                    <subscribe-button  inline-template :channel="{{$channel}}" :initial-subscriptions="{{$channel->subscriptions}}">
                                        <button @click="toggleSubscription"  class="btn btn-danger">
                                            @{{owner ? '' : subscribed ? 'Unsubscribe' : 'Subscribe' }} @{{count}} @{{owner ? 'subscribers' : '' }}
                                        </button>
                                    </subscribe-button>
                                </div>

                                    <input onchange="document.getElementById('update-channel-form').submit()"
                                           style="display: none" type="file" name="image" id="image">

                                    @if($channel->editable())
                                        <div class="form-group">
                                            <label for="name" class="form-control-label">Name</label>
                                            <input type="text" name="name" id="name" value="{{$channel->name}}"
                                                   class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="description" class="form-control-label">Description</label>
                                            <textarea name="description" id="description" rows="3"
                                                      class="form-control">{{$channel->description}}</textarea>
                                        </div>


                                        @if ($errors->any())
                                            <ul class="list-group mb-5">
                                                @foreach($errors->all() as $erro)
                                                    <li class="text-danger list-group-item">{{$erro}}</li>
                                                @endforeach
                                            </ul>
                                        @endif

                                        <button class="btn btn-success" type="submit">
                                            Update Channel
                                        </button>
                            </form>

                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
