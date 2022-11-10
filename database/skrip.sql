CREATE DATABASE logingbij;

use logingbij;
create table  user_role (id int not null primary key auto_increment,
role varchar(128) not null
);

create table user(id int not null primary key auto_increment,
nama varchar(128) not null, email varchar(128) not null,
image varchar(128) not null, passwordd varchar (256) not null,
role_id int,
is_active int(1),
date_created int
);

			CREATE TABLE jemaat(
								id_jemaat int not null primary key auto_increment,
								nik_jemaat varchar(40) not null,
								nama_jemaat varchar(200) not null,
								jk_jemaat enum('L','P'),
								tempat_lahir varchar(50),
								tanggal_lahir date,
								tanggal_dibaptis date,
								tanggal_kematian VARCHAR (20),
								alamat varchar(200) not null,
								pekerjaan varchar(200) not null,
								status_aktif enum('pindah', 'mati', 'nikah', 'berhenti','merantau'),
								status_perkawinan enum('Kawin', 'Singgle', 'Janda', 'Duda'),
								foto VARCHAR(65)
			);

CREATE TABLE pendeta(
						id_pendeta INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
						no_sk VARCHAR(20) NOT NULL,
						nik VARCHAR(20) NOT NULL,
						nama VARCHAR(200) NOT NULL,
						jk ENUM('Laki-laki','Perempuan'),
						tempat_lahir VARCHAR(40),
						tanggal_lahir DATE,
						asal VARCHAR(200),
						pendidikan VARCHAR(20),
						tanggal_mulai DATE,
						tanggal_selesai DATE,
						status VARCHAR(20),
						foto VARCHAR(65)
						);
	CREATE TABLE baptis(
		id_baptis int not null primary key auto_increment,
		id_jemaat int,
		no_surat_baptis varchar(40) not null,
		nama_baptis varchar(200) not null,
		jenis_kelamin enum('Laki-laki', 'Perempuan'),
		nama_pendeta varchar(200) not null,
		tempat_baptis varchar(50),
		tanggal_baptis date,
		key fk_jemaat_baptis(id_jemaat),
		key fk_pendeta_baptis(id_pendeta),
		constraint fk_jemaat_baptis foreign key(id_jemaat)references jemaat (id_jemaat),
		constraint fk_pendeta_baptis foreign key(id_pendeta)references pendeta (id_pendeta)
);					

CREATE TABLE nikah (
					   id_nikah INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
					   no_nikah VARCHAR(20) NOT NULL,
					   nama_pria VARCHAR(200) NOT NULL,
					   nama_wanita VARCHAR(200) NOT NULL,
					   nama_pendeta VARCHAR(200) NOT NULL,
					   saksi_nikah VARCHAR(200) NOT NULL,
					   tempat_nikah VARCHAR(50) NOT NULL,
					   tanggal_nikah DATE NOT NULL,
					   tanggal_cerai DATE
);


create table Pindah_Jemaat(
							  Id_Pindah int not null primary key auto_increment,
							  Nama_Jemaat varchar(50) not null,
							  Gereja_Asal varchar(50),
							  Gereja_Tujuan varchar(50),
							  Alasan_Pindah Varchar(200),
							  key fk_jemaat_baptis(id_jemaat),
							  
);

create table pengurusGereja (
						  id_pengurusGereja INT not null primary key AUTO_INCREMENT,
						  no_kk varchar(20) not null,
						  nik varchar(20) not null,
						  nama varchar(200) not null,
						  jenis_kelamin enum('L', 'P'),
						  tanggal_lahir date,
						  tempat_lahir varchar(100) not null,
						  pendidikan enum('Tidak Sekolah','SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'D5', 'S1', 'S2', 'S3', 'Lainnya'),
						  jabatan varchar(200) not null,
						  alamat varchar(200) not null,
						  status_pernikahan enum('Menikah','Sudah Nikah', 'Janda', 'Duda'),
						  foto varchar(200));

create table cerai (
    id_cerai int not null primary key auto_increment,
    no_surat_cerai varchar(20) not null,
    nama_pria varchar(200) not null,
    nama_wanita varchar(200) not null,
    tanggal_cerai date,
    alasan_cerai text,
    foto varchar(200)
);

 ALTER TABLE namatabel
DROP FOREIGN KEY namafield;