@extends('layouts.frontend')
@section('title','Guru - '. $app_name->value)
@section('content')

<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
                    <li style="background-image: url({{ asset($background->value) }});">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-sm-12 col-md-offset-3 col-xs-12 slider-text">
									<div class="slider-text-inner text-center">
										<h1>Guru</h1>
										<h2 class="breadcrumbs"><span><a href="{{ url('/') }}">Home</a></span> | <span>Guru</span></h2>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>
		
		<div class="colorlib-trainers">
			<div class="container">
				<div class="row row-pb-md">
                    @foreach($data['guru'] as $key => $guru)
					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="desc">
								<h3>{{ $guru->nama }} - ( {{ $guru->jabatan }} )</h3>
								<span>TMT : {{ Carbon\Carbon::parse($guru->tmt)->translatedFormat('d F Y')}}</span>
							</div>
							<div class="trainer-img mb-3" style="background-image: url({{ asset($guru->foto) }})"></div>
							<div class="desc">
                                <p>TTL : {{ $guru->tempat_lahir }} , {{ Carbon\Carbon::parse($guru->ttl)->translatedFormat('d F Y')}} </p>
                                <a data-toggle="modal" data-target="#exampleModal--{{ $key }}" class="float-right details" style="border-bottom-style: dotted;float:right;">Info Detail</a>
                                
                                
							</div>
						</div>
					</div>


                      <!-- modal -->
                    <div class="modal fade" id="exampleModal--{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $guru->nama }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table>
                                <tr>
                                    <td>Pendidikan</td>
                                    <td>:</td>
                                    <td>{{ $guru->pendidikan }}</td>
                                </tr>
                                <tr>
                                    <td>Tempat,Tanggal Lahir</td>
                                    <td>:</td>
                                    <td>{{ $guru->tempat_lahir }}, {{ Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                                </tr> 
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td> {{  $guru->jk == 'L' ? 'Laki-Laki' : 'Perempuan'  }}</td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>Jabatan</td>
                                    <td>:</td>
                                    <td>{{ $guru->jabatan }}</td>
                                </tr>
                                <tr>
                                    <td>Tahun Masuk</td>
                                    <td>:</td>
                                    <td>{{ Carbon\Carbon::parse($guru->thn_masuk)->translatedFormat('d F Y')  }}</td>
                                </tr>
                                <tr>
                                    <td>TMT</td>
                                    <td>:</td>
                                    <td>{{ Carbon\Carbon::parse($guru->tmt)->translatedFormat('d F Y') }}</td>
                                </tr>
                                
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td>{{ $guru->agama }}</td>
                                </tr>

                                <tr>
                                    <td>Pelatihan</td>
                                    <td>:</td>
                                    <td>
                                        
                                            @if($guru->pelatihan != null)
                                            @foreach($guru->pelatihan as $pelatihan)
                                                {{ $pelatihan }} ,
                                            @endforeach
                                            @else
                                                Data Kosong
                                            @endif
                                        
                                    </td>
                                </tr>

                                <tr>
                                    <td>Prestasi</td>
                                    <td>:</td>
                                    <td> @if($guru->prestasi != null)
                                            @foreach($guru->prestasi as $prestasi)
                                                {{ $prestasi }} ,
                                            @endforeach
                                            @else
                                                Data Kosong
                                            @endif</td>
                                </tr>

                                <tr>
                                    <td>Penghargaan</td>
                                    <td>:</td>
                                    <td> @if($guru->penghargaan != null)
                                            @foreach($guru->penghargaan as $penghargaan)
                                                {{ $penghargaan }} ,
                                            @endforeach
                                            @else
                                                Data Kosong
                                            @endif</td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td> <br>{{ strip_tags($guru->alamat) }}</td>
                                </tr>


                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                                
                            </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
					
				</div>
				
			</div>
		</div>

@endsection