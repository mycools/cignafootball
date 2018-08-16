@extends('layouts.user')

@section('og_title', "Match of The Weeks")
@section('og_description', "ลุ้นรางวัล ดูบอลที่อังกฤษทุกเดือน")
@section('og_image', "/images/share/share.jpg")

@section('content')

<div class="fullpage-wrapper register-page">

	<div class="section fp-auto-height active">
		<div class="container">

			<h1 class="h-title">ลืมรหัสผ่าน</h1>
			<div class="row mt-20 mb-15">
				<div class="col-12 col-sm-10 col-md-8 col-lg-7 m-auto">
					<div class="box-wrapper">

						<div class="row">
							<div class="col-11 col-md-10 col-lg-8 m-auto">

                                <form method="post" enctype="multipart/form-data" action="{{ route('user.sentEmailForgotPassword') }}">
                                    {{ csrf_field() }}
                                    @if(Session::has('flash_messages'))
                                        @php
                                            $flash_messages = Session::get('flash_messages');
                                        @endphp
                                        <div class="alert alert-{{$flash_messages['status']}}">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            {{$flash_messages['messages']}}
                                        </div>
                                    @elseif ($errors->any())
                                        <div class="alert alert-danger">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <ul style="padding-left: 20px; margin-bottom: 0;">
                                                @foreach ($errors->all() as $error)
                                                    <li>
                                                        {{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
									<div class="form-group row">
										<label class="col-md-3 text-md-right pr-0 col-form-label">E-mail</label>
										<div class="col-md-9">
											<input name="email" type="email" class="form-control" value="" required>
											<div class="mt-15 text-small font-light">“ในกรณีไม่ได้รับอีเมล์ กรุณาตรวจสอบใน junk mail”</div>
										</div>
									</div>

								<div class="row">
									<div class="col-md-9 ml-auto">
										<div class="text-center mt-15">
											<button class="btn btn-green" type ="submit">ยืนยัน</button>
										</div>
									</div>
								</div>
                                </form>
							</div>
						</div>

					</div>
				</div>
			</div>

		</div>
	</div>

</div>

@endsection
