<li class="menu-item  menu-item-here">
	<a href="/teacher" class="menu-link">
		<span class="menu-text">Dashboard</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item">
	<a href="/teacher/student" class="menu-link">
		<span class="menu-text">Siswa</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item">
	<a href="{{ route('teacher.nilai.analisis') }}" class="menu-link">
		<span class="menu-text">Analisis Nilai</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item">
	<a href="/teacher/mapel" class="menu-link">
		<span class="menu-text">Mapel</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
	<a href="javascript:;" class="menu-link menu-toggle">
		<span class="menu-text">Master</span>
		<span class="menu-desc"></span>
		<i class="menu-arrow"></i>
	</a>
	<div class="menu-submenu menu-submenu-classic menu-submenu-left">
		<ul class="menu-subnav">
			<li class="menu-item">
				<a href="{{ route('teacher.student.export') }}" class="menu-link">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Join-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"/>
								<path d="M9,10 L9,19 L5,19 L5,10 L5,6 L18,6 L18,10 L9,10 Z" fill="#000000" transform="translate(11.500000, 12.500000) scale(-1, 1) translate(-11.500000, -12.500000) "/>
								<circle fill="#000000" opacity="0.3" cx="8" cy="16" r="2"/>
							</g>
						</svg><!--end::Svg Icon-->
					</span>
					<span class="menu-text">Export Data Siswa</span>
				</a>
			</li>
			<li class="menu-item">
				<a href="{{ route('teacher.nilai.input') }}" class="menu-link">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\PenAndRuller.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"/>
								<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"/>
								<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"/>
							</g>
						</svg><!--end::Svg Icon-->
					</span>
					<span class="menu-text">Input Nilai</span>
				</a>
			</li>
            @if(auth()->guard('teacher')->user()->kelas_id)
			<li class="menu-item">
				<a href="{{ route('teacher.upd.input') }}" class="menu-link">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Cap-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<circle fill="#000000" opacity="0.3" cx="12" cy="7" r="2"/>
								<path d="M11,19 L4,19 L4,7 L7.03051599,7 C7.01035184,7.16416693 7,7.33099545 7,7.5 C7,9.67706212 8.71775968,11.4930404 11,11.9099837 L11,19 Z M13,19 L13,11.9099837 C15.2822403,11.4930404 17,9.67706212 17,7.5 C17,7.33099545 16.9896482,7.16416693 16.969484,7 L20,7 L20,19 L13,19 Z" fill="#000000"/>
							</g>
						</svg><!--end::Svg Icon-->
					</span>
					<span class="menu-text">Input Upd</span>
				</a>
			</li>
			<li class="menu-item">
				<a href="{{ route('teacher.akhlak.input') }}" class="menu-link">
					<span class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z M17,16 L17,10 C17,8.34314575 15.6568542,7 14,7 L8,7 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L17,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
							<path d="M9.27272727,9 L13.7272727,9 C14.5522847,9 15,9.44771525 15,10.2727273 L15,14.7272727 C15,15.5522847 14.5522847,16 13.7272727,16 L9.27272727,16 C8.44771525,16 8,15.5522847 8,14.7272727 L8,10.2727273 C8,9.44771525 8.44771525,9 9.27272727,9 Z" fill="#000000"/>
						</g>
					</svg><!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Input Akhlak</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('teacher.ketidakhadiran.input') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Shopping\Chart-bar3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="7" y="4" width="3" height="13" rx="1.5"/>
                                <rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8" rx="1.5"/>
                                <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
                                <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Input Ketidakhadiran</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('teacher.prestasi.input') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Home\Curtains.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M3,4 C3,3.44771525 3.44771525,3 4,3 L11,3 L11,5 C11,9.418278 7.418278,13 3,13 L3,4 Z M21,4 L21,13 C16.581722,13 13,9.418278 13,5 L13,3 L20,3 C20.5522847,3 21,3.44771525 21,4 Z" fill="#000000" opacity="0.3"/>
                                <path d="M4,21 C3.44771525,21 3,20.5522847 3,20 L3,13 C6.3137085,13 9,15.6862915 9,19 L9,21 L4,21 Z M20,21 L15,21 L15,19 C15,15.6862915 17.6862915,13 21,13 L21,20 C21,20.5522847 20.5522847,21 20,21 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Input Prestasi</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('teacher.kelulusan.input') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Cap-3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M13,19 L13,15.8999819 C15.2822403,15.4367116 17,13.4189579 17,11 C17,8.23857625 14.7614237,6 12,6 C9.23857625,6 7,8.23857625 7,11 C7,13.4189579 8.71775968,15.4367116 11,15.8999819 L11,19 L4,19 L4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 L20,19 L13,19 Z" fill="#000000"/>
                                <circle fill="#000000" opacity="0.3" cx="12" cy="11" r="2"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Input Kelulusan</span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('teacher.hasil_ujian.input') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Interselect.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M6,9 L6,15 C6,16.6568542 7.34314575,18 9,18 L15,18 L15,18.8181818 C15,20.2324881 14.2324881,21 12.8181818,21 L5.18181818,21 C3.76751186,21 3,20.2324881 3,18.8181818 L3,11.1818182 C3,9.76751186 3.76751186,9 5.18181818,9 L6,9 Z M17,16 L17,10 C17,8.34314575 15.6568542,7 14,7 L8,7 L8,6.18181818 C8,4.76751186 8.76751186,4 10.1818182,4 L17.8181818,4 C19.2324881,4 20,4.76751186 20,6.18181818 L20,13.8181818 C20,15.2324881 19.2324881,16 17.8181818,16 L17,16 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path d="M9.27272727,9 L13.7272727,9 C14.5522847,9 15,9.44771525 15,10.2727273 L15,14.7272727 C15,15.5522847 14.5522847,16 13.7272727,16 L9.27272727,16 C8.44771525,16 8,15.5522847 8,14.7272727 L8,10.2727273 C8,9.44771525 8.44771525,9 9.27272727,9 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">Input Hasil Ujian</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</li>
