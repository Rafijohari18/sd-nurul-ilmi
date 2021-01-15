@extends('layouts.frontend')
@section('title','Siswa - '. $app_name->value)
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
										<h1>Siswa</h1>
										<h2 class="breadcrumbs"><span><a href="{{ url('/') }}">Home</a></span> | <span>Siswa</span></h2>
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
                    @foreach($data['siswa'] as $key => $siswa)
					<div class="col-md-3 col-sm-3 animate-box">
						<div class="trainers-entry">
							<div class="desc">
								<h3>{{ $siswa->nama }} - ( {{ $siswa->nisn }} )</h3>
								
							</div>
							<div class="trainer-img mb-3" style="background-image: url({{ asset($siswa->foto) }})"></div>
							<div class="desc">
                                <p>TTL : {{ $siswa->tempat_lahir }} , {{ Carbon\Carbon::parse($siswa->ttl)->translatedFormat('d F Y')}} </p>
                                <a data-toggle="modal" data-target="#exampleModal--{{ $key }}" class="float-right details" style="border-bottom-style: dotted;float:right;">Info Detail</a>
                                
                                
							</div>
						</div>
					</div>


                      <!-- modal -->
                    <div class="modal fade" id="exampleModal--{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $siswa->nama }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table>
                                <tr>
                                    <td>No Induk</td>
                                    <td>:</td>
                                    <td>&nbsp; {{ $siswa->no_induk }}</td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>:</td>
                                    <td>&nbsp;{{ $siswa->nisn }}</td>
                                </tr>
                               
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>:</td>
                                    <td>&nbsp; {{  $siswa->jk == 'L' ? 'Laki-Laki' : 'Perempuan'  }}</td>
                                </tr>
                                
                                
                                <tr>
                                    <td>TTL</td>
                                    <td>:</td>
                                    <td>&nbsp;{{ $siswa->tempat_lahir }} ,{{ Carbon\Carbon::parse($siswa->tgl_lahir)->translatedFormat('d F Y')  }}</td>
                                </tr>

                                <tr>
                                    <td>Umur</td>
                                    <td>:</td>
                                    <td>&nbsp; {{  $siswa->umur }}</td>
                                </tr>
                            
                                
                                <tr>
                                    <td>Agama</td>
                                    <td>:</td>
                                    <td>&nbsp;{{ $siswa->agama }}</td>
                                </tr>

                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td>&nbsp;{{ strip_tags($siswa->alamat) }}</td>
                                </tr>

                                <tr>
                                    <td>Nama Orang Tua</td>
                                    <td>:</td>
                                    <td>&nbsp;{{ $siswa->nama_ortu }}</td>
                                </tr>

                                <tr>
                                    <td>Pendidikan Orang Tua</td>
                                    <td>:</td>
                                    <td>&nbsp;{{ $siswa->pendidikan_ortu }}</td>
                                </tr>

                                <tr>
                                    <td>Alamat Orang Tua</td>
                                    <td>:</td>
                                    <td>&nbsp;{{ strip_tags($siswa->alamat) }}</td>
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