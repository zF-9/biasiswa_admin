@extends('User.layout.main_User')
@section('content')

<div class="row justify-content-center">
  <div class="col-xl-9 col-lg-9">

    <!--<div class="container">-->

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-12">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0" > <!-- justify-content-center -->
            <!-- Nested Row within Card Body -->
            <div class="row"> <!-- justify-content-center -->

              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">BORANG MAKLUMAT PEGAWAI</h1>
                  </div>
                  <!--<form class="user">-->
                  <form class="user" method="post" action="/permohonan_baru" enctype="multipart/form-data" autocomplete="off">
                  {{ csrf_field() }}

                  <div class="row">
                    <div class="form-group col-lg-6">
                      <div class="form-group">
                      <label>Nama</label>
                      <input name="nama" type="text" class="form-control form-control-user" id="InputNama" value="{{ auth()->user()->name }}" aria-describedby="emailHelp" placeholder="Nama Pemohon">
                    </div>
                    </div>
                    <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>No. Kad Pengenalan</label>
                      <input name="nokp" type="text" class="form-control form-control-user" id="InputKp" maxlength="14" placeholder="Nombor Kad Pengenalan: xxxxxx-xx-xxxx">
                    </div>
                    </div>
                  </div>

                <div class="row">
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Tarikh Lahir</label>
                      <input name="trkhlahir" type="text" class="form-control form-control-user tlahir" id="Inputlahir" maxlength="10" placeholder="Tarikh Lahir: xx-xx-xxxx"/>
                    </div> 
                  </div>               
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Umur</label>
                      <input name="umur" type="text" class="form-control form-control-user inputumur" id="InputUmur" placeholder="Umur">
                    </div>
                  </div>
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Taraf Perkahwinan</label>
                        <select name="tarafkahwin" class="form-group form-control-user" placeholder="Pilih la yang mana satu">
                          <option>Bujang</option>
                          <option>Berkahwin</option>
                        </select>
                    </div>
                  </div>
                </div>  

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>No. Telefon Peribadi</label>
                      <input name="telno" maxlength="12" value="+60" type="text" class="form-control form-control-user" id="InputFon" placeholder="Nombor Telefon (Peribadi)">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>No. Telefon Pejabat</label>
                      <input name="telnoPej" maxlength="10" value="+60" type="text" class="form-control form-control-user" id="InputFonOff" placeholder="Nombor Telefon (Pejabat)">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-12">
                    <div class="form-group">
                      <label>Alamat Rumah Semasa</label>
                      <input name="alamat_1" type="text" class="form-control form-control-user" id="InputAlamat" placeholder="Cth: Jalan 1234, Lorong 42">
                      <input name="alamat_2" type="text" class="form-control form-control-user" id="InputAlamat" placeholder="Cth: 88400 Kota Kinabalu Sabah">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input name="email" type="text" class="form-control form-control-user" id="InputEmail" value="{{ auth()->user()->email }}" placeholder="Alamat Email">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Nama Agensi/Jabatan</label>
                        <select name="jabatan" class="form-group form-control-user" placeholder="Pilih la yang mana satu">
                          <option>Kementerian Pembangunan Luar Bandar</option>
                          <option>Kementerian Kewangan</option>
                          <option>Kementerian Pertanian dan Industri Makanan</option>
                          <option>Kementerian Pembangunan Infrastruktur</option>
                          <option>Kementerian Kerajaan Tempatan dan Perumahan</option>
                          <option>Kementerian Kesihatan dan Kesejahteraan Rakyat</option>
                          <option>Kementerian Pelancongan, Kebudayaan dan Alam Sekitar</option>
                          <option>Kementerian Perdagangan dan Perindustrian</option>
                          <option>Kementerian Belia dan Sukan Sabah</option>
                          <option>Kementerian Pelajaran dan Inovasi</option>
                          <option>Kementerian Undang-undang dan Hal Ehwal Anak Negeri</option>
                          <option>Pejabat Yang Dipertua Negeri Sabah / Istana Negeri</option>
                          <option>Pejabat Dewan Undangan Negeri</option>
                          <option>Suruhanjaya Perkhidmatan Awam Negeri</option>
                          <option>Pejabat Setiausaha Kerajaan Negeri</option>
                          <option>Pejabat Ketua Menteri</option>
                          <option>Pejabat Timbalan Setiausaha Kerajaan Negeri (Pentadbiran)</option>
                          <option>Pejabat Timbalan Setiausaha Kerajaan Negeri (Pembangunan)</option>
                          <option>Jabatan Arkib Negeri Sabah</option>
                          <option>Jabatan Peguam Besar Negeri</option>
                          <option>Jabatan Cetak Kerajaan</option>
                          <option>Jabatan Perkhidmatan Awam Negeri</option>
                          <option>Jabatan Tanah & Ukur</option>
                          <option>Jabatan Perhutanan Sabah</option>
                          <option>Institut Latihan Sektor Awam Negeri</option>
                          <option>Unit Perancang Ekonomi Negeri</option>
                          <option>Unit Penyampaian Perkhidmatan</option>
                          <option>Unit Pemimpin Pembangunan Masyarakat</option>
                          <option>Pejabat Perhubungan Negeri Sabah</option>
                          <option>Bahagian Istiadat dan Protokol</option>
                          <option>Bahagian Pengurusan dan Kewangan</option>
                          <option>Bahagian Kabinet dan Dasar</option>
                          <option>Pejabat Akhbar dan Penerbitan</option>
                          <option>Pejabat Hasil Bumi</option>
                          <option>Pejabat Hal Ehwal Dalam Negeri dan Penyelidikan</option>
                          <option>Jabatan Bendahari Negeri</option>
                          <option>Jabatan Perkhidmatan Komputer Negeri</option>
                          <option>Jabatan Perikanan</option>
                          <option>Jabatan Perkhidmatan Veterinar Sabah</option>
                          <option>Jabatan Pengairan dan Saliran</option>
                          <option>Jabatan Pertanian</option>
                          <option>Jabatan Air Negeri Sabah</option>
                          <option>Jabatan Kerja Raya</option>
                          <option>Jabatan Keretapi Negeri Sabah</option>
                          <option>Jabatan Pelabuhan dan Dermaga Sabah</option>
                          <option>Jabatan Perancang Bandar dan Wilayah</option>
                          <option>Jabatan Perkhidmatan Kebajikan Am</option>
                          <option>Perpustakaan Negeri Sabah</option>
                          <option>Jabatan Hal Ehwal Wanita Negeri</option>
                          <option>Jabatan Hidupan Liar</option>
                          <option>Jabatan Perlindungan Alam Sekitar</option>
                          <option>Jabatan Muzium Sabah</option>
                          <option>Jabatan Pembangunan Perindustrian dan Penyelidikan</option>
                          <option>Jabatan Pembangunan Sumber Manusia</option>
                          <option>Jabatan Hal Ehwal Agama Islam Negeri Sabah</option>
                          <option>Jabatan Hal Ehwal Anak Negeri Sabah</option>
                          <option>Pejabat Mufti Negeri</option>
                          <option>Pejabat Daerah Putatan</option>
                          <option>Pejabat Daerah Kecil Paitan</option>
                          <option>Pejabat Daerah Kecil Pagalungan</option>
                          <option>Pejabat Daerah Kecil Tungku</option>
                          <option>Pejabat Daerah Telupid</option>
                          <option>Pejabat Daerah Kecil Banggi</option>
                          <option>Pejabat Daerah Kecil Tamparuli</option>
                          <option>Pejabat Daerah Kecil Menumbok</option>
                          <option>Pejabat Daerah Kecil Membakut</option>
                          <option>Pejabat Daerah Kecil Matunggong</option>
                          <option>Pejabat Daerah Kecil Sook</option>
                          <option>Pejabat Daerah Kecil Kemabong</option>
                          <option>Pejabat Daerah Penampang</option>
                          <option>Pejabat Daerah Papar</option>
                          <option>Pejabat Daerah Tuaran</option>
                          <option>Pejabat Daerah Kota Belud</option>
                          <option>Pejabat Daerah Ranau</option>
                          <option>Pejabat Daerah Kudat</option>
                          <option> Pejabat Daerah Kota Marudu</option>
                          <option>Pejabat Daerah Pitas</option>
                          <option>Pejabat Daerah Keningau</option>
                          <option>Pejabat Daerah Tambunan</option>
                          <option>Pejabat Daerah Nabawan</option>
                          <option>Pejabat Daerah Sipitang</option>
                          <option>Pejabat Daerah Tenom</option>
                          <option>Pejabat Daerah Beaufort</option>
                          <option>Pejabat Daerah Kuala Penyu</option>
                          <option>Pejabat Daerah Kinabatangan</option>
                          <option>Pejabat Daerah Beluran</option>
                          <option>Pejabat Daerah Semporna</option>
                          <option>Pejabat Daerah Lahad Datu</option>
                          <option>Pejabat Daerah Kunak</option>
                          <option>Pejabat Daerah Tongod</option>
                          <option>Pejabat Daerah Kalabakan</option>
                          <option>Dewan Bandaraya Kota Kinabalu</option>
                          <option>Majlis Perbandaran Sandakan</option>
                          <option>Majlis Perbandaran Tawau</option>
                          <option>Majlis Daerah Beaufort</option>
                          <option>Majlis Daerah Beluran</option>
                          <option>Majlis Daerah Keningau</option>
                          <option>Majlis Daerah Kinabatangan</option>
                          <option>Majlis Daerah Tongod</option>
                          <option>Majlis Daerah Putatan</option>
                          <option>Majlis Daerah Kota Belud</option>
                          <option>Majlis Daerah Kota Marudu</option>
                          <option>Majlis Daerah Kuala Penyu</option>
                          <option>Majlis Daerah Kunak</option>
                          <option>Majlis Daerah Lahad Datu</option>
                          <option>Majlis Daerah Nabawan</option>
                          <option>Majlis Daerah Papar</option>
                          <option>Majlis Daerah Penampang</option>
                          <option>Majlis Daerah Ranau</option>
                          <option>Majlis Daerah Semporna</option>
                          <option>Majlis Daerah Sipitang</option>
                          <option>Majlis Daerah Tambunan</option>
                          <option>Majlis Daerah Tenom</option>
                          <option>Majlis Daerah Tuaran</option>
                          <option>Lembaga Bandaran Kudat</option>
                          <option>Majlis Daerah Pitas</option>
                          <option>Lembaga Kemajuan Perhutanan Negeri Sabah (SAFODA)</option>
                          <option>Lembaga Industri Getah Sabah</option>
                          <option>Korporasi Pembangunan Desa (KPD)</option>
                          <option>Korporasi Kemajuan Perikanan dan Nelayan Sabah (KO-NELAYAN)</option>
                          <option>Lembaga Pelabuhan-Pelabuhan Sabah</option>
                          <option>Lembaga Pembangunan Perumahan dan Bandar</option>
                          <option>Lembaga Pemegang Amanah Taman-Taman Sabah</option>
                          <option>Lembaga Pelancongan Sabah</option>
                          <option>Lembaga Kebudayaan Negeri Sabah</option>
                          <option>Perbadanan Pembangunan Ekonomi Negeri Sabah (SEDCO)</option>
                          <option>Lembaga Sukan Negeri Sabah</option>
                          <option>Majlis Ugama Islam Sabah (MUIS)</option>
                          <option>Perbadanan Baitulmal Negeri Sabah</option>

                        </select>
                    </div>
                  </div>
                  </div> 

                  <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Tarikh Pelantikan</label>
                      <input name="tarikhlantik" type="text" class="form-control form-control-user Tlantik" id="InputTlantik" placeholder="Tarikh Perlantikan">
                    </div>
                  </div>
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Tahun Berkhidmat</label>
                      <input name="tberkhidmat" type="text" class="form-control form-control-user inputKhidmat" id="InputTkhidmat" placeholder="Tahun Berkhidmat">
                    </div>
                  </div>
                </div>
                


                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Nama Jawatan (e.g Pegawai Tadbir,  dll)</label>
                      <input name="jawatan" type="text" class="form-control form-control-user" id="InputJawatan" placeholder="Jawatan">
                    </div>
                  </div>
                  
                  <div class="form-group col-lg-0">
                    <div class="form-group">
                      <label>Gred Jawatan</label>
                      <select name="skim" class="form-group form-control-user" id="InputSkim"  placeholder="Sila Pilih..">
                          <option>A</option>
                          <option>AB</option>
                          <option>AL</option>
                          <option>AT</option>
                          <option>C</option>
                          <option>DU</option>
                          <option>DS</option>
                          <option>DUG</option>
                          <option>DG</option>
                          <option>DM</option>
                          <option>DUF</option>
                          <option>DH</option>
                          <option>DG</option>
                          <option>E</option>
                          <option>F</option>
                          <option>FA</option>
                          <option>FT</option>
                          <option>G</option>
                          <option>GV</option>
                          <option>H</option>
                          <option>J</option>
                          <option>JA</option>
                          <option>KB</option>
                          <option>KA</option>
                          <option>KP</option>
                          <option>KB</option>
                          <option>LS</option>
                          <option>L</option>
                          <option>LA</option>
                          <option>N</option>
                          <option>NT</option>
                          <option>Q</option>
                          <option>S</option>
                          <option>UF</option>
                          <option>UG</option>
                          <option>U</option>
                          <option>UD</option>
                          <option>W</option>
                          <option>WA</option>
                          <option>WK</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group col-lg-2">
                    <div class="form-group">
                        <input name="Gred" type="text" class="form-control form-control-user" id="InputGred" placeholder="Gred">
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <div class="form-group">
                      <label>Taraf Perlantikan</label>
                      <select name="TarafLantik" class="form-group form-control-user">
                          <option>Tetap</option>
                          <option>Kontrak</option>
                          <option>Sementara</option>
                          <option>Percubaan</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-group">
                      <label>Tarikh Pengesahan Jawatan</label>
                      <input  name="Tsahjwtn" type="text" class="form-control form-control-user date" id="InputTsahjwtn" placeholder="Tarikh Pengesahan Jawatan">
                    </div>
              </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                  </div>
                </div>
                <div class="row">
                  <h4>Laporan Penilaian Prestasi Tahunan </h4>
                </div>
                  <div class="row">
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label >Tahun Pertama</label>
                      <input type="text" class="yearpicker form-control form-control-user" value="" id="year_1"/>
                      <input name="Tahun1LPPT" type="text" class="form-control form-control-user" id="InputT1" placeholder="">
                    </div>
                  </div> 
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label >Tahun Kedua</label>
                      <input type="text" class="yearpicker form-control form-control-user" value="" id="year_2"/>
                      <input name="Tahun2LPPT" type="text" class="form-control form-control-user" id="InputT2" placeholder="">
                    </div>
                  </div>                  
                  <div class="form-group col-lg-4">
                    <div class="form-group">
                      <label>Tahun Ketiga</label>
                      <input type="text" class="yearpicker form-control form-control-user" value="" id="year_3"/>
                      <input name="Tahun3LPPT" type="text" class="form-control form-control-user" id="InputT3" placeholder="">
                    </div>
                  </div>  
                </div>
                <div class="form-group col-lg-6">
                          <div class="form-group">
                            <label>Kelulusan Akademik</label>
                              <select name="AkademikLvl" class="form-group form-control-user" placeholder="Pilih la yang mana satu">
                                <option>SPM</option>
                                <option>Diploma</option>
                                <option>Sarjana Muda</option>
                                <option>Sarjana</option>
                                <option>Doktor Falsafah</option>
                              </select>
                          </div>
                        </div>

                        <i></i>
                        <div class="form-group col-lg-8">
                          <div class="form-group">
                            <label>*Sila Nyatakan Kelulusan Akademik</label>
                            <input name="AkademikInfo" type="text" class="form-control form-control-user" value="" id="InputAkademik" placeholder="akademik">
                          </div>
                        </div>
                      </div>
                    </div>
                   </div>
                  

                    <!--<div class="form-group">
                      <input name="universiti" type="text" class="form-control form-control-user" id="InputUni" placeholder="Nama Universiti">
                    </div>
                    <div class="form-group">
                      <input name="akademik" type="text" class="form-control form-control-user" id="InputAkademik" placeholder="Kelulusan Akademik">
                    </div>

                    <div class="form-group">
                      <input name="tarikhlantik" type="text" class="form-control form-control-user date" id="InputTlantik" placeholder="Tarikh Perlantikan">
                    </div>

                    <div class="form-group">
                      <input name="tarikhsahjwtn" type="text" class="form-control form-control-user date" id="InputTsahjwtn" placeholder="Tarikh Pengesahan Jawatan">
                    </div>-->
                    

                    <!-- copy this pattern row -->
                    <div class="row">
                      <div class="form-group col-lg-6">


                      </div>
                    </div> 
                    <!-- copy this pattern row -->



                    <!--<div class="form-group">
                      <input name="bidang" type="text" class="form-control form-control-user" id="InputBidang" placeholder="Bidang">
                    </div>-->
                    <!--<a href="index.html" class="btn btn-primary btn-user btn-block">
                      Login
                    </a>-->
                    <hr>
                    <div class="btn" style="float: right; margin-right: 0px; margin-bottom: 12px">
                      <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('Save') }}</button>
                    </div>
                  </form>
                  <!--<hr>
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    <!--</div>
    </div>
</div>-->
<!-- end of borang permohonan -->
@endsection
