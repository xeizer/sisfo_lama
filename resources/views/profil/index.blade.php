@extends('layouts.tema1.app')
@section('konten')
<div class="row">
    <div class="col-lg-12">
        <div class="cover-profile">
            <div class="profile-bg-img">
                <img class="profile-bg-img img-fluid" src="{{ asset('mega-able/files/assets/images/user-profile/bg-img1.jpg')}}" alt="bg-img">
                <div class="card-block user-info">
                    <div class="col-md-12">
                        <div class="media-left">
                            <img  src="{{asset('gambar/nofoto.png')}}" alt="user-img">
                        </div>
                        <div class="media-body row">
                            <div class="col-lg-12">
                                <div class="user-title">
                                    <h2>{{Auth::user()->name}}</h2>
                                    <span class="text-white">
                                        @foreach (Auth::user()->roles()->get() as $peran)
                                        <div class="label-main">
                                            <div class="label label-lg label-{{$peran->color}}">{{$peran->display_name}}</div>
                                        </div>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                            <div>
                                <div class="pull-right cover-btn">
                                    <button type="button" class="btn btn-primary m-r-10 m-b-10"><i class="icofont-plus"></i> Follow</button>
                                    <button type="button" class="btn btn-primary m-b-10"><i class="icofont icofont-ui-messaging"></i><i class="fa fa-envelope" aria-hidden="true"></i> Message</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">

        <div class="tab-header card">
            <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist" id="mytab">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#personal" role="tab">Personal Info</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#binfo" role="tab">User's Services</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#contacts" role="tab">User's Contacts</a>
                    <div class="slide"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#review" role="tab">Reviews</a>
                    <div class="slide"></div>
                </li>
            </ul>
        </div>

        <div class="tab-content">

            <div class="tab-pane active" id="personal" role="tabpanel">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Tentang {{Auth::user()->name}}</h5>
                        <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                            <i class="icofont icofont-edit"></i><i class="fa fa-pencil" aria-hidden="true"></i> Ubah Profil
                        </button>
                    </div>
                    <div class="card-block">
                        <div class="view-info">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="general-info">
                                        <div class="row">
                                            <div class="col-lg-12 col-xl-6">
                                                <div class="table-responsive">
                                                    <table class="table m-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Nama Lengkap</th>
                                                                <td>{{Auth::user()->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Jenis Kelamin</th>
                                                                <td>{{Auth::user()->jkel}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Agama</th>
                                                                <td>{{Auth::user()->agama}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Tempat Lahir</th>
                                                                <td>{{Auth::user()->tempat_lahir}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Tanggal lahir</th>
                                                                <td>{{Auth::user()->tanggal_lahir ? Auth::user()->tanggal_lahir->format('d-M-Y') : '-'}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Alamat</th>
                                                                <td>{{Auth::user()->alamat}}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-lg-12 col-xl-6">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">Email</th>
                                                                <td>{{Auth::user()->email}}</td>
                                                            </tr>
                                                            @role('siswa')
                                                            <tr>
                                                                <th scope="row">NISN</th>
                                                                <td>{{'nisn'}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">Kelas / Jurusan</th>
                                                                <td>{{'kelas'}} / {{'Jurusan'}}</td>
                                                            </tr>
                                                            @endrole
                                                            @role('guru|kepsek')
                                                            <tr>
                                                                <th scope="row">NIP</th>
                                                                <td>{{'nip'}}</td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">NUPTK</th>
                                                                <td>{{'nuptk'}}</td>
                                                            </tr>
                                                            @endrole
                                                            <tr>
                                                                <th scope="row">Telepon</th>
                                                                <td>{{Auth::user()->tlp}}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <form action="" enctype="application/x-www-form-urlencoded" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="edit-info">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="general-info form-material">
                                            <div class="row">
                                                <div class="col-lg-6 ">
                                                    <div class="material-group">
                                                        <div class="material-addone">
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <input type="text" name="name" class="form-control" required="">
                                                            <span class="form-bar"></span>
                                                            <label class="float-label">Nama Lengkap</label>
                                                        </div>
                                                    </div>
                                                    <div class="material-group">
                                                        <div class="material-addone">
                                                            <i class="fa fa-venus-mars"></i>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <div class="form-radio">
                                                                <div class="group-add-on">
                                                                    <div class="radio radiofill radio-inline">
                                                                        <label>
                                                                            <input type="radio" name="jkel" checked><i class="helper"></i> Laki-Laki
                                                                        </label>
                                                                    </div>
                                                                    <div class="radio radiofill radio-inline">
                                                                        <label>
                                                                            <input type="radio" name="jkel"><i class="helper"></i> Perempuan
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="material-group">
                                                        <div class="material-addone">
                                                            <i class="fa fa-birthday-cake"></i>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <input type="text" name="tempat_lahir" class="form-control" required="">
                                                            <span class="form-bar"></span>
                                                            <label class="float-label">Tempat Lahir</label>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <input type="date" name="tanggal_lahir" class="form-control" required="">
                                                            <span class="form-bar"></span>
                                                            <label class="float-label"></label>
                                                        </div>
                                                    </div>
                                                    <div class="material-group">
                                                        <div class="material-addone">
                                                            <i class="fa fa-heart"></i>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <select id="hello-single" class="form-control" name="agama">
                                                                <option value="">---- Agama ----</option>
                                                                <option value="Islam">Islam</option>
                                                                <option value="Protestan">Protestan</option>
                                                                <option value="Khatolik">Khatolik</option>
                                                                <option value="Hindu">Hindu</option>
                                                                <option value="Budha">Budha</option>
                                                            </select>
                                                            <span class="form-bar"></span>
                                                        </div>
                                                    </div>
                                                    <div class="material-group">
                                                        <div class="material-addone">
                                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <input type="text" name="alamat" class="form-control" required="">
                                                            <span class="form-bar"></span>
                                                            <label class="float-label">Alamat</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="material-group">
                                                        <div class="material-addone">
                                                            <i class="fa fa-envelope" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <input type="text" name="email" class="form-control" required="">
                                                            <span class="form-bar"></span>
                                                            <label class="float-label">Email</label>
                                                        </div>
                                                    </div>
                                                    <div class="material-group">
                                                        <div class="material-addone">
                                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                                        </div>
                                                        <div class="form-group form-primary">
                                                            <input type="text" name="tlp" class="form-control" required="">
                                                            <span class="form-bar"></span>
                                                            <label class="float-label">No Telepon</label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">Simpan Perubahan</button>
                                                <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Description About Me</h5>
                                <button id="edit-info-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
                                    <i class="icofont icofont-edit"></i>
                                </button>
                            </div>
                            <div class="card-block user-desc">
                                <div class="view-desc">
                                    <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?" "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able To Do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pain.</p>
                                </div>
                                <div class="edit-desc">
                                    <div class="col-md-12">
                                        <textarea id="description">
                                            <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?" "On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able To Do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pain.</p>
                                        </textarea>
                                    </div>
                                    <div class="text-center">
                                        <a href="#!" class="btn btn-primary waves-effect waves-light m-r-20 m-t-20">Save</a>
                                        <a href="#!" id="edit-cancel-btn" class="btn btn-default waves-effect m-t-20">Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="binfo" role="tabpanel">

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">User Services</h5>
                    </div>
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card b-l-success business-info services m-b-20">
                                    <div class="card-header">
                                        <div class="service-header">
                                            <a href="#">
                                                <h5 class="card-header-text">Shivani Hero</h5>
                                            </a>
                                        </div>
                                        <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                        <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i> Delete</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i> View</a>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="task-detail">Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte.</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card b-l-danger business-info services">
                                    <div class="card-header">
                                        <div class="service-header">
                                            <a href="#">
                                                <h5 class="card-header-text">Dress and Sarees</h5>
                                            </a>
                                        </div>
                                        <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                        <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i> Delete</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i> View</a>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="task-detail">Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte.</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card b-l-info business-info services">
                                    <div class="card-header">
                                        <div class="service-header">
                                            <a href="#">
                                                <h5 class="card-header-text">Shivani Auto Port</h5>
                                            </a>
                                        </div>
                                        <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                        <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i> Delete</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i> View</a>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="task-detail">Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte.</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card b-l-warning business-info services">
                                    <div class="card-header">
                                        <div class="service-header">
                                            <a href="#">
                                                <h5 class="card-header-text">Hair stylist</h5>
                                            </a>
                                        </div>
                                        <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                        <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i> Delete</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i> View</a>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="task-detail">Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte.</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card b-l-danger business-info services">
                                    <div class="card-header">
                                        <div class="service-header">
                                            <a href="#">
                                                <h5 class="card-header-text">BMW India</h5>
                                            </a>
                                        </div>
                                        <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                        <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i> Delete</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i> View</a>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="task-detail">Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte.</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card b-l-success business-info services">
                                    <div class="card-header">
                                        <div class="service-header">
                                            <a href="#">
                                                <h5 class="card-header-text">Shivani Hero</h5>
                                            </a>
                                        </div>
                                        <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                        <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i> Edit</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i> Delete</a>
                                            <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i> View</a>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <p class="task-detail">Lorem ipsum dolor sit amet, consectet ur adipisicing elit, sed do eiusmod temp or incidi dunt ut labore et.Lorem ipsum dolor sit amet, consecte.</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-header-text">Profit</h5>
                            </div>
                            <div class="card-block">
                                <div id="main" style="height:300px;width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="tab-pane" id="contacts" role="tabpanel">
                <div class="row">
                    <div class="col-xl-3">

                        <div class="card">
                            <div class="card-header contact-user">
                                <img class="img-radius img-40" src="../files/assets/images/avatar-4.jpg" alt="contact-user">
                                <h5 class="m-l-10">John Doe</h5>
                            </div>
                            <div class="card-block">
                                <ul class="list-group list-contacts">
                                    <li class="list-group-item active"><a href="#">All Contacts</a></li>
                                    <li class="list-group-item"><a href="#">Recent Contacts</a></li>
                                    <li class="list-group-item"><a href="#">Favourite Contacts</a></li>
                                </ul>
                            </div>
                            <div class="card-block groups-contact">
                                <h4>Groups</h4>
                                <ul class="list-group">
                                    <li class="list-group-item justify-content-between">
                                        Project
                                        <span class="badge badge-primary badge-pill">30</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Notes
                                        <span class="badge badge-success badge-pill">20</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Activity
                                        <span class="badge badge-info badge-pill">100</span>
                                    </li>
                                    <li class="list-group-item justify-content-between">
                                        Schedule
                                        <span class="badge badge-danger badge-pill">50</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Contacts<span class="f-15"> (100)</span></h4>
                            </div>
                            <div class="card-block">
                                <div class="connection-list">
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-1.jpg" alt="f-1" data-toggle="tooltip" data-placement="top" data-original-title="Airi Satou">
                                    </a>
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-2.jpg" alt="f-2" data-toggle="tooltip" data-placement="top" data-original-title="Angelica Ramos">
                                    </a>
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-3.jpg" alt="f-3" data-toggle="tooltip" data-placement="top" data-original-title="Ashton Cox">
                                    </a>
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-4.jpg" alt="f-4" data-toggle="tooltip" data-placement="top" data-original-title="Cara Stevens">
                                    </a>
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-5.jpg" alt="f-5" data-toggle="tooltip" data-placement="top" data-original-title="Garrett Winters">
                                    </a>
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-1.jpg" alt="f-6" data-toggle="tooltip" data-placement="top" data-original-title="Cedric Kelly">
                                    </a>
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-3.jpg" alt="f-7" data-toggle="tooltip" data-placement="top" data-original-title="Brielle Williamson">
                                    </a>
                                    <a href="#"><img class="img-fluid img-radius" src="../files/assets/images/user-profile/follower/f-5.jpg" alt="f-8" data-toggle="tooltip" data-placement="top" data-original-title="Jena Gaines">
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-9">
                        <div class="row">
                            <div class="col-sm-12">

                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="card-header-text">Contacts</h5>
                                    </div>
                                    <div class="card-block contact-details">
                                        <div class="data_table_main table-responsive dt-responsive">
                                            <table id="simpletable" class="table  table-striped table-bordered nowrap">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobileno.</th>
                                                        <th>Favourite</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="80e1e2e3b1b2b3c0e7ede1e9ecaee3efed">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f6979495c7c4c5b6919b979f9ad895999b">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="65040706545756250208040c094b060a08">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d0b1b2b3e1e2e390b7bdb1b9bcfeb3bfbd">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0263606133303142656f636b6e2c616d6f">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b6d7d4d5878485f6d1dbd7dfda98d5d9db">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="19787b7a282b2a597e74787075377a7674">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5f3e3d3c6e6d6c1f38323e3633713c3032">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a0c1c2c3919293e0c7cdc1c9cc8ec3cfcd">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="65040706545756250208040c094b060a08">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b9d8dbda888b8af9ded4d8d0d597dad6d4">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bddcdfde8c8f8efddad0dcd4d193ded2d0">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6100030250535221060c00080d4f020e0c">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0d6c6f6e3c3f3e4d6a606c6461236e6260">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ea8b8889dbd8d9aa8d878b8386c4898587">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4b2a29287a79780b2c262a222765282426">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b4d5d6d7858687f4d3d9d5ddd89ad7dbd9">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="98f9fafba9aaabd8fff5f9f1f4b6fbf7f5">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5c3d3e3f6d6e6f1c3b313d3530723f3331">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e0818283d1d2d3a0878d81898cce838f8d">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a8c9cacb999a9be8cfc5c9c1c486cbc7c5">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ef8e8d8cdedddcaf88828e8683c18c8082">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0a6b68693b38394a6d676b636624696567">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star-o" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0d6c6f6e3c3f3e4d6a606c6461236e6260">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fc9d9e9fcdcecfbc9b919d9590d29f9391">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="eb8a8988dad9d8ab8c868a8287c5888486">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="8aebe8e9bbb8b9caede7ebe3e6a4e9e5e7">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="34555657050607745359555d581a575b59">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="81e0e3e2b0b3b2c1e6ece0e8edafe2eeec">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="afcecdcc9e9d9cefc8c2cec6c381ccc0c2">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ea8b8889dbd8d9aa8d878b8386c4898587">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0263606133303142656f636b6e2c616d6f">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a5c4c7c6949796e5c2c8c4ccc98bc6cac8">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4f2e2d2c7e7d7c0f28222e2623612c2022">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="d2b3b0b1e3e0e192b5bfb3bbbefcb1bdbf">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a7c6c5c4969594e7c0cac6cecb89c4c8ca">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0667646537343546616b676f6a2865696b">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="eb8a8988dad9d8ab8c868a8287c5888486">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0667646537343546616b676f6a2865696b">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="a6c7c4c5979495e6c1cbc7cfca88c5c9cb">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5031323361626310373d31393c7e333f3d">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c0a1a2a3f1f2f380a7ada1a9aceea3afad">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6302010052515023040e020a0f4d000c0e">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b2d3d0d1838081f2d5dfd3dbde9cd1dddf">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="cdacafaefcfffe8daaa0aca4a1e3aea2a0">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4e2f2c2d7f7c7d0e29232f2722602d2123">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="fd9c9f9ecccfcebd9a909c9491d39e9290">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="81e0e3e2b0b3b2c1e6ece0e8edafe2eeec">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="e6878485d7d4d5a6818b878f8ac885898b">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5a3b38396b68691a3d373b333674393537">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Garrett Winters</td>
                                                        <td><a href="http://html.phoenixcoded.net/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="6203000153505122050f030b0e4c010d0f">[email&#160;protected]</a></td>
                                                        <td>9989988988</td>
                                                        <td><i class="fa fa-star" aria-hidden="true"></i></td>
                                                        <td class="dropdown">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog" aria-hidden="true"></i></button>
                                                            <div class="dropdown-menu dropdown-menu-right b-none contact-menu">
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-edit"></i>Edit</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-delete"></i>Delete</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye-alt"></i>View</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-tasks-alt"></i>Project</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-ui-note"></i>Notes</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-eye"></i>Activity</a>
                                                                <a class="dropdown-item" href="#!"><i class="icofont icofont-badge"></i>Schedule</a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobileno.</th>
                                                        <th>Favourite</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane" id="review" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-header-text">Review</h5>
                    </div>
                    <div class="card-block">
                        <ul class="media-list">
                            <li class="media">
                                <div class="media-left">
                                    <a href="#">
                                        <img class="media-object img-radius comment-img" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h6 class="media-heading">Sortino media<span class="f-12 text-muted m-l-5">Just now</span></h6>
                                    <div class="stars-example-css review-star">
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                        <i class="icofont icofont-star"></i>
                                    </div>
                                    <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                    <div class="m-b-25">
                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                    </div>
                                    <hr>

                                    <div class="media mt-2">
                                        <a class="media-left" href="#">
                                            <img class="media-object img-radius comment-img" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                            <h6 class="media-heading">Larry heading <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                            <div class="stars-example-css review-star">
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                            </div>
                                            <p class="m-b-0"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                            <div class="m-b-25">
                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                            </div>
                                            <hr>

                                            <div class="media mt-2">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-radius comment-img" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Colleen Hurst <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                    </p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media mt-2">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object img-radius comment-img" src="../files/assets/images/avatar-1.jpg" alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Cedric Kelly<span class="f-12 text-muted m-l-5">Just now</span></h6>
                                            <div class="stars-example-css review-star">
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                            </div>
                                            <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                            <div class="m-b-25">
                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="media mt-2">
                                        <a class="media-left" href="#">
                                            <img class="media-object img-radius comment-img" src="../files/assets/images/avatar-4.jpg" alt="Generic placeholder image">
                                        </a>
                                        <div class="media-body">
                                            <h6 class="media-heading">Larry heading <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                            <div class="stars-example-css review-star">
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                            </div>
                                            <p class="m-b-0"> Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                            <div class="m-b-25">
                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                            </div>
                                            <hr>

                                            <div class="media mt-2">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object img-radius comment-img" src="../files/assets/images/avatar-3.jpg" alt="Generic placeholder image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h6 class="media-heading">Colleen Hurst <span class="f-12 text-muted m-l-5">Just now</span></h6>
                                                    <div class="stars-example-css review-star">
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                        <i class="icofont icofont-star"></i>
                                                    </div>
                                                    <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.
                                                    </p>
                                                    <div class="m-b-25">
                                                        <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                                    </div>
                                                </div>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media mt-2">
                                        <div class="media-left">
                                            <a href="#">
                                                <img class="media-object img-radius comment-img" src="../files/assets/images/avatar-2.jpg" alt="Generic placeholder image">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="media-heading">Mark Doe<span class="f-12 text-muted m-l-5">Just now</span></h6>
                                            <div class="stars-example-css review-star">
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                                <i class="icofont icofont-star"></i>
                                            </div>
                                            <p class="m-b-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis.</p>
                                            <div class="m-b-25">
                                                <span><a href="#!" class="m-r-10 f-12">Reply</a></span><span><a href="#!" class="f-12">Edit</a> </span>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <form class="form-material right-icon-control">
                            <div class="form-group form-primary">
                                <input type="text" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Write something.....</label>
                            </div>
                            <div class="form-icon ">
                                <button class="btn btn-success btn-icon  waves-effect waves-light">
                                    <i class="icofont icofont-send-mail"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@push('script')
    <script src="{{ asset('mega-able/files/assets/pages/user-profile.js')}}"></script>
    <script src="{{ asset('mega-able/files/bower_components/datatables.net/js/jquery.dataTables.min.js' ) }}"></script>
    <script src="{{ asset('mega-able/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js' ) }}"></script>
    <script src="{{ asset('mega-able/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js' ) }}"></script>
    <script src="{{ asset('mega-able/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js' ) }}"></script>
    <script src="{{ asset('mega-able/files/assets/pages/ckeditor/ckeditor.js')}}"></script>
@endpush
@endsection
