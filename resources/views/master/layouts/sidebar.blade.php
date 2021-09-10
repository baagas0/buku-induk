<li class="menu-item  menu-item-here">
	<a href="{{ route('master.home') }}" class="menu-link">
		<span class="menu-text">Dashboard</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item">
	<a href="{{ route('master.student') }}" class="menu-link">
		<span class="menu-text">Siswa</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item">
	<a href="{{ route('master.e-rapor') }}" class="menu-link">
		<span class="menu-text">E-rapor</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item">
	<a href="{{ route('teacher.nilai.analisis') }}" class="menu-link">
		<span class="menu-text">Hasil Ujian</span>
		<i class="menu-arrow"></i>
	</a>
</li>

<li class="menu-item">
	<a href="{{ route('master.mapel') }}" class="menu-link">
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
				<a href="{{ route('master.student.export') }}" class="menu-link">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Join-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"/>
								<path d="M9,10 L9,19 L5,19 L5,10 L5,6 L18,6 L18,10 L9,10 Z" fill="#000000" transform="translate(11.500000, 12.500000) scale(-1, 1) translate(-11.500000, -12.500000) "/>
								<circle fill="#000000" opacity="0.3" cx="8" cy="16" r="2"/>
							</g>
						</svg><!--end::Svg Icon-->
					</span>
					<span class="menu-text">Data Siswa</span>
				</a>
			</li>
			
		<li class="menu-item">
			<a href="{{ route('master.kelulusan.input') }}" class="menu-link">
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
			<a href="{{ route('master.hasil_ujian.input') }}" class="menu-link">
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
	</ul>
</div>
</li>

<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
	<a href="javascript:;" class="menu-link menu-toggle">
		<span class="menu-text">Pengguna</span>
		<span class="menu-desc"></span>
		<i class="menu-arrow"></i>
	</a>
	<div class="menu-submenu menu-submenu-classic menu-submenu-left">
		<ul class="menu-subnav">
			<li class="menu-item">
				<a href="{{ route('master.user.teacher') }}" class="menu-link">
					<span class="svg-icon menu-icon">
						<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Join-1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<rect x="0" y="0" width="24" height="24"/>
								<path d="M9,10 L9,19 L5,19 L5,10 L5,6 L18,6 L18,10 L9,10 Z" fill="#000000" transform="translate(11.500000, 12.500000) scale(-1, 1) translate(-11.500000, -12.500000) "/>
								<circle fill="#000000" opacity="0.3" cx="8" cy="16" r="2"/>
							</g>
						</svg><!--end::Svg Icon-->
					</span>
					<span class="menu-text">Guru</span>
				</a>
			</li>
			
		<li class="menu-item">
			<a href="{{ route('master.user.master') }}" class="menu-link">
				<span class="svg-icon menu-icon">
					<!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\legacy\metronic\theme\html\demo2\dist/../src/media/svg/icons\Design\Cap-3.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
						<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
							<rect x="0" y="0" width="24" height="24"/>
							<path d="M13,19 L13,15.8999819 C15.2822403,15.4367116 17,13.4189579 17,11 C17,8.23857625 14.7614237,6 12,6 C9.23857625,6 7,8.23857625 7,11 C7,13.4189579 8.71775968,15.4367116 11,15.8999819 L11,19 L4,19 L4,12 C4,7.581722 7.581722,4 12,4 C16.418278,4 20,7.581722 20,12 L20,19 L13,19 Z" fill="#000000"/>
							<circle fill="#000000" opacity="0.3" cx="12" cy="11" r="2"/>
						</g>
					</svg><!--end::Svg Icon-->
				</span>
				<span class="menu-text">Karyawan</span>
			</a>
		</li>
	</ul>
</div>
</li>

<li class="menu-item">
	<a href="{{ route('master.setting') }}" class="menu-link">
		<span class="menu-text">Pengaturan</span>
		<i class="menu-arrow"></i>
	</a>
</li>