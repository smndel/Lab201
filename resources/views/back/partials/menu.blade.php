<aside class="col-12 col-md-2 p-0 bg-dark">
            <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
                <div class="collapse navbar-collapse">
                    <ul class="flex-md-column flex-row navbar-nav w-100 justify-content-between" style="font-size:20px">
                        <li class="nav-item">
                            <a class="nav-link pl-0 text-nowrap" href="{{route('admin.index')}}"><i class="fa fa-bullseye fa-fw"></i> <span class="font-weight-bold">AFOGEC</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="{{route('actuality.index')}}"><i class="fa fa-heart fa-fw"></i> <span class="d-none d-md-inline">Actualités</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="{{route('service.index')}}"><i class="fa fa-book fa-fw"></i> <span class="d-none d-md-inline">Services</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="{{route('partner.index')}}"><i class="fa fa-star fa-fw"></i> <span class="d-none d-md-inline">Collaborateurs</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="{{route('applicant.index')}}"><i class="fa fa-list fa-fw"></i> <span class="d-none d-md-inline">Bénéficiaires</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link pl-0" href="{{route('calendar')}}"><i class="fa fa-calendar fa-fw"></i> <span class="d-none d-md-inline">Calendrier</span></a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Divers
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                              <a class="dropdown-item" href="{{route('accreditation.index')}}">Accréditations</a>
                              <a class="dropdown-item" href="{{route('reference.index')}}">References</a>
                              <a class="dropdown-item" href="{{route('testimony.index')}}">Témoignages</a>
                            </div>
                          </li>
                    </ul>
                </div>
            </nav>
        </aside>

