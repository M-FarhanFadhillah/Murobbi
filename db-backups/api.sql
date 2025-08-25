/*
PostgreSQL Backup
Database: laravel/public
Backup Time: 2024-01-09 14:47:37
*/

DROP SEQUENCE IF EXISTS "public"."absensi_sholats_id_seq";
DROP SEQUENCE IF EXISTS "public"."activities_id_seq";
DROP SEQUENCE IF EXISTS "public"."admins_id_seq";
DROP SEQUENCE IF EXISTS "public"."banners_id_seq";
DROP SEQUENCE IF EXISTS "public"."data_ziswafs_id_seq";
DROP SEQUENCE IF EXISTS "public"."education_id_seq";
DROP SEQUENCE IF EXISTS "public"."failed_jobs_id_seq";
DROP SEQUENCE IF EXISTS "public"."jenis_educations_id_seq";
DROP SEQUENCE IF EXISTS "public"."jenis_ziswafs_id_seq";
DROP SEQUENCE IF EXISTS "public"."lap_keus_id_seq";
DROP SEQUENCE IF EXISTS "public"."masjids_id_seq";
DROP SEQUENCE IF EXISTS "public"."migrations_id_seq";
DROP SEQUENCE IF EXISTS "public"."personal_access_tokens_id_seq";
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
DROP SEQUENCE IF EXISTS "public"."waktu_sholats_id_seq";
DROP TABLE IF EXISTS "public"."absensi_sholats";
DROP TABLE IF EXISTS "public"."activities";
DROP TABLE IF EXISTS "public"."admins";
DROP TABLE IF EXISTS "public"."banners";
DROP TABLE IF EXISTS "public"."data_ziswafs";
DROP TABLE IF EXISTS "public"."education";
DROP TABLE IF EXISTS "public"."failed_jobs";
DROP TABLE IF EXISTS "public"."jenis_educations";
DROP TABLE IF EXISTS "public"."jenis_ziswafs";
DROP TABLE IF EXISTS "public"."lap_keus";
DROP TABLE IF EXISTS "public"."masjids";
DROP TABLE IF EXISTS "public"."migrations";
DROP TABLE IF EXISTS "public"."password_resets";
DROP TABLE IF EXISTS "public"."personal_access_tokens";
DROP TABLE IF EXISTS "public"."users";
DROP TABLE IF EXISTS "public"."waktu_sholats";
CREATE SEQUENCE "absensi_sholats_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "activities_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "admins_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "banners_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "data_ziswafs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "education_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "failed_jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "jenis_educations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "jenis_ziswafs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "lap_keus_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "masjids_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;
CREATE SEQUENCE "personal_access_tokens_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE SEQUENCE "waktu_sholats_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;
CREATE TABLE "absensi_sholats" (
  "id" int8 NOT NULL DEFAULT nextval('absensi_sholats_id_seq'::regclass),
  "waktu_sholat_id" int8 NOT NULL,
  "users_id" int8 NOT NULL,
  "status_sholat" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "lokasi_sholat" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tanggal_sholat" date NOT NULL DEFAULT '2023-11-13'::date,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "absensi_sholats" OWNER TO "postgres";
CREATE TABLE "activities" (
  "id" int8 NOT NULL DEFAULT nextval('activities_id_seq'::regclass),
  "masjid_id" int8 NOT NULL,
  "activity_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "decription" text COLLATE "pg_catalog"."default" NOT NULL,
  "categories" int4 NOT NULL,
  "pict" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "activities" OWNER TO "postgres";
CREATE TABLE "admins" (
  "id" int8 NOT NULL DEFAULT nextval('admins_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "no_hp" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "profil_pict" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "admins" OWNER TO "postgres";
CREATE TABLE "banners" (
  "id" int8 NOT NULL DEFAULT nextval('banners_id_seq'::regclass),
  "judul" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "deskripsi" text COLLATE "pg_catalog"."default" NOT NULL,
  "cover" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "kategori" int4 NOT NULL,
  "status" bool NOT NULL DEFAULT false
)
;
ALTER TABLE "banners" OWNER TO "postgres";
CREATE TABLE "data_ziswafs" (
  "id" int8 NOT NULL DEFAULT nextval('data_ziswafs_id_seq'::regclass),
  "users_id" int8 NOT NULL,
  "masjid_id" int8 NOT NULL,
  "jenis_ziswaf_id" int8 NOT NULL,
  "no_rek" int4 NOT NULL,
  "asal_bank" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "nominal" float8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "data_ziswafs" OWNER TO "postgres";
CREATE TABLE "education" (
  "id" int8 NOT NULL DEFAULT nextval('education_id_seq'::regclass),
  "jenis_education_id" int8 NOT NULL,
  "judul" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "kategori" int4 NOT NULL,
  "content" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "deskripsi" text COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "education" OWNER TO "postgres";
CREATE TABLE "failed_jobs" (
  "id" int8 NOT NULL DEFAULT nextval('failed_jobs_id_seq'::regclass),
  "uuid" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "connection" text COLLATE "pg_catalog"."default" NOT NULL,
  "queue" text COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "exception" text COLLATE "pg_catalog"."default" NOT NULL,
  "failed_at" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP
)
;
ALTER TABLE "failed_jobs" OWNER TO "postgres";
CREATE TABLE "jenis_educations" (
  "id" int8 NOT NULL DEFAULT nextval('jenis_educations_id_seq'::regclass),
  "jenis_edukasi" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "slug" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "jenis_educations" OWNER TO "postgres";
CREATE TABLE "jenis_ziswafs" (
  "id" int8 NOT NULL DEFAULT nextval('jenis_ziswafs_id_seq'::regclass),
  "jenis_ziswaf" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "slug" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "jenis_ziswafs" OWNER TO "postgres";
CREATE TABLE "lap_keus" (
  "id" int8 NOT NULL DEFAULT nextval('lap_keus_id_seq'::regclass),
  "masjid_id" int8 NOT NULL,
  "cashflow" int4 NOT NULL,
  "note" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "date" date NOT NULL,
  "nominal" float8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "lap_keus" OWNER TO "postgres";
CREATE TABLE "masjids" (
  "id" int8 NOT NULL DEFAULT nextval('masjids_id_seq'::regclass),
  "masjid_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "masjid_pict" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "alamat" text COLLATE "pg_catalog"."default" NOT NULL,
  "ketua_masjid" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "kapasitas" int4 NOT NULL,
  "saldo_awal" float8 NOT NULL,
  "kas" float8 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "masjids" OWNER TO "postgres";
CREATE TABLE "migrations" (
  "id" int4 NOT NULL DEFAULT nextval('migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;
ALTER TABLE "migrations" OWNER TO "postgres";
CREATE TABLE "password_resets" (
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0)
)
;
ALTER TABLE "password_resets" OWNER TO "postgres";
CREATE TABLE "personal_access_tokens" (
  "id" int8 NOT NULL DEFAULT nextval('personal_access_tokens_id_seq'::regclass),
  "tokenable_type" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tokenable_id" int8 NOT NULL,
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "token" varchar(64) COLLATE "pg_catalog"."default" NOT NULL,
  "abilities" text COLLATE "pg_catalog"."default",
  "last_used_at" timestamp(0),
  "expires_at" timestamp(0),
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "personal_access_tokens" OWNER TO "postgres";
CREATE TABLE "users" (
  "id" int8 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "no_hp" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "profil_pict" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "is_admin" bool NOT NULL DEFAULT false,
  "status" int4 NOT NULL DEFAULT 0,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "users" OWNER TO "postgres";
CREATE TABLE "waktu_sholats" (
  "id" int8 NOT NULL DEFAULT nextval('waktu_sholats_id_seq'::regclass),
  "nama_sholat" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "waktu_sholat" time(0) NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;
ALTER TABLE "waktu_sholats" OWNER TO "postgres";
BEGIN;
LOCK TABLE "public"."absensi_sholats" IN SHARE MODE;
DELETE FROM "public"."absensi_sholats";
INSERT INTO "public"."absensi_sholats" ("id","waktu_sholat_id","users_id","status_sholat","lokasi_sholat","tanggal_sholat","created_at","updated_at") VALUES (1, 1, 2, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(2, 2, 2, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(3, 3, 2, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(4, 4, 2, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(5, 5, 2, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(6, 1, 1, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(7, 2, 1, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(8, 3, 1, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(9, 4, 1, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(10, 5, 1, 'Berjamaah', 'Masjid', '2023-10-15', '2023-10-15 04:50:26', '2023-10-15 04:50:26')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."activities" IN SHARE MODE;
DELETE FROM "public"."activities";
INSERT INTO "public"."activities" ("id","masjid_id","activity_name","decription","categories","pict","created_at","updated_at") VALUES (1, 1, 'Pengajian Bersama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?', 0, 'test123', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(2, 1, 'Kajian Bersama', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?', 1, 'test123', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(3, 2, 'Tabligh Akbar', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?', 2, 'test123', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(4, 3, 'Bazaar UMKM', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse voluptatibus temporibus, a non sequi ad voluptas ipsam accusantium ipsum ut?', 2, 'test123', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(6, 7, 'Fun Futsal', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam quidem quae ratione obcaecati? Ex, hic sapiente. Ex?', 0, 'tesrt21', '2023-10-20 01:27:16', '2023-10-20 01:27:16'),(8, 8, 'Fun Futsal', 'Kegiatan Fun Futsal merupakan komunitas yang menghimpun kesukaan mahasiswa dalam bentuk olahraga sepakbola dalam ruangan dan kegiatan tersebut dilakukan rutin', 2, 'gambar-kegiatan/uJaQSR9ijruIDj8Ze8ppynyJWNxz5eS2LsH2uhll.jpg', '2023-10-30 03:03:37', '2023-10-30 03:03:37')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."admins" IN SHARE MODE;
DELETE FROM "public"."admins";
INSERT INTO "public"."admins" ("id","name","email","no_hp","profil_pict","password","created_at","updated_at") VALUES (1, 'Master Admin', 'madmin@gmail.com', '081371610786', 'test123', 'qwerty123', '2023-10-23 04:48:03', '2023-10-23 04:48:03')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."banners" IN SHARE MODE;
DELETE FROM "public"."banners";
INSERT INTO "public"."banners" ("id","judul","deskripsi","cover","created_at","updated_at","kategori","status") VALUES (8, 'Lampung Berjaya', 'Jaya selalu Lampung ku tecinta', 'cover-banner/ZzwB22iDC6Ots9bY0kougLaXrrCiglLJbT33EL9o.jpg', '2023-10-30 02:22:56', '2023-11-13 02:13:57', 1, 'f'),(9, 'Buka Bersama', 'Buka puasa bersama bukan sekedar temu kangen dan ketawa-ketawa bersama teman, namun lihatlah sebagai momen untuk menyambung tali silaturrahmi.', 'cover-banner/owfHI2N6X5AwcpippWye37MRCY9qhoEMpnMrhNDJ.jpg', '2023-11-13 02:02:49', '2023-11-13 02:14:00', 2, 't'),(11, '"Free Palestine" Menggema di Surabaya', 'Puluhan ribu masyarakat Jawa Timur melakukan aksi bela Palestina di depan Gedung Negara Grahadi, Jalan Gubernur Suryo, Surabaya, Minggu 12 November 2023.', 'cover-banner/nnGmWleA4OSN4U3DrW26wb6koS1v5tKmZAV6ySw6.jpg', '2023-11-13 02:13:52', '2023-11-13 02:14:03', 0, 't'),(10, 'Diskon 50% Paket Umroh', 'Umroh Spesial Diskon khusus Uwais Al Qarni Masa Kini! · Pembuatan Passport · Penambahan 3 Suku Kata Passport · Suntik Meningitis / Suntik Vaksin Covid · PCR', 'cover-banner/E3hzX8HmjnKy3KboqC4fWL7ypxQMMC4JHkg4eoJ8.jpg', '2023-11-13 02:11:53', '2023-11-13 02:14:06', 1, 't')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."data_ziswafs" IN SHARE MODE;
DELETE FROM "public"."data_ziswafs";
INSERT INTO "public"."data_ziswafs" ("id","users_id","masjid_id","jenis_ziswaf_id","no_rek","asal_bank","nominal","created_at","updated_at") VALUES (1, 2, 8, 1, 1234, 'Bank Mandiri', 10000000, '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(2, 2, 8, 2, 1234, 'Bank Mandiri', 10000000, '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(3, 2, 8, 3, 1234, 'Bank Mandiri', 10000000, '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(4, 2, 8, 4, 1234, 'Bank Mandiri', 10000000, '2023-10-15 04:50:26', '2023-10-15 04:50:26')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."education" IN SHARE MODE;
DELETE FROM "public"."education";
INSERT INTO "public"."education" ("id","jenis_education_id","judul","kategori","content","deskripsi","created_at","updated_at") VALUES (9, 1, 'The Richest Man in Babylon', 1, 'konten-edukasi/Dgpn9ut8b18hyWhUdjRQsIhXbHfbvgMIgnWZ279k.jpg', 'Buku Keren ini', '2023-10-30 02:40:38', '2023-10-30 02:40:38'),(1, 2, 'Batu', 0, 'konten-edukasi/MwJ0ffatCBrOc3EC18DlgdoliiWzgn3CyxnIQeYr.mp4', '"Hambatan seringkali merupakan batu loncatan." - William Prescott', '2023-11-28 02:33:08', '2023-11-28 02:33:08')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."failed_jobs" IN SHARE MODE;
DELETE FROM "public"."failed_jobs";
COMMIT;
BEGIN;
LOCK TABLE "public"."jenis_educations" IN SHARE MODE;
DELETE FROM "public"."jenis_educations";
INSERT INTO "public"."jenis_educations" ("id","jenis_edukasi","slug","created_at","updated_at") VALUES (1, 'Buku', 'buku', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(2, 'Video', 'video', '2023-10-15 04:50:26', '2023-10-15 04:50:26')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."jenis_ziswafs" IN SHARE MODE;
DELETE FROM "public"."jenis_ziswafs";
INSERT INTO "public"."jenis_ziswafs" ("id","jenis_ziswaf","slug","created_at","updated_at") VALUES (1, 'Zakat', 'zakat', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(2, 'Infaq', 'infaq', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(3, 'Shodaqoh', 'shodaqoh', '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(4, 'Wakaf', 'wakaf', '2023-10-15 04:50:26', '2023-10-15 04:50:26')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."lap_keus" IN SHARE MODE;
DELETE FROM "public"."lap_keus";
INSERT INTO "public"."lap_keus" ("id","masjid_id","cashflow","note","date","nominal","created_at","updated_at") VALUES (1, 1, 1, 'Beli Semen 2 Sak', '2023-10-15', 1000000, '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(2, 1, 0, 'Uang Kaleng', '2023-10-16', 500000, '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(3, 1, 0, 'Uang Kaleng', '2023-10-17', 700000, '2023-10-15 04:50:26', '2023-10-15 04:50:26'),(4, 7, 0, 'Penjualan Al-Quran', '2023-10-20', 200000, '2023-10-20 01:49:47', '2023-10-20 01:49:47'),(5, 8, 0, 'Penjualan Al-Quran', '2023-11-06', 1000000, '2023-11-06 01:19:49', '2023-11-06 01:19:49'),(6, 8, 1, 'Pembelian Semen 10 Sak', '2023-11-07', 10000000, '2023-11-06 01:20:52', '2023-11-06 01:20:52'),(8, 8, 1, 'Biaya Jumatan', '2023-12-10', 1000000, '2023-11-06 01:23:29', '2023-11-06 01:23:29'),(7, 8, 0, 'Infaq Masjid', '2023-12-08', 5000000, '2023-11-06 01:22:54', '2023-11-06 01:22:54')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."masjids" IN SHARE MODE;
DELETE FROM "public"."masjids";
INSERT INTO "public"."masjids" ("id","masjid_name","masjid_pict","alamat","ketua_masjid","kapasitas","saldo_awal","kas","created_at","updated_at") VALUES (8, 'Al-Fajri', 'masjid-profile/aV3GPPcLSjkxtfuLxBwuC9IMpquWEldCi61lGNXj.jpg', 'Palembang, Sumatera Selatan', 'Zaki Fauzan', 1200, 20000000, 20000000, '2023-10-30 02:17:22', '2023-10-30 02:17:22'),(9, 'Al-Fatah', 'masjid-profile/U3730LtADJ8xfkTxWwA9VxH8OhDdIjDI2Qod8LRy.jpg', 'Tanggamus, Lampung', 'Raden Aji', 1400, 15500000, 15500000, '2023-11-13 01:54:55', '2023-11-13 01:54:55')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."migrations" IN SHARE MODE;
DELETE FROM "public"."migrations";
INSERT INTO "public"."migrations" ("id","migration","batch") VALUES (1, '2014_10_12_000000_create_users_table', 1),(2, '2014_10_12_100000_create_password_resets_table', 1),(3, '2019_08_19_000000_create_failed_jobs_table', 1),(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),(5, '2023_10_09_025058_create_banners_table', 1),(6, '2023_10_09_025216_create_data_ziswafs_table', 1),(7, '2023_10_09_025305_create_masjids_table', 1),(8, '2023_10_09_025341_create_education_table', 1),(9, '2023_10_09_025352_create_activities_table', 1),(10, '2023_10_09_025418_create_lap_keus_table', 1),(11, '2023_10_09_025655_create_jenis_ziswafs_table', 1),(12, '2023_10_09_025715_create_jenis_educations_table', 1),(13, '2023_10_09_071149_create_admins_table', 1),(14, '2023_10_11_064646_create_waktu_sholats_table', 1),(15, '2023_10_11_064706_create_absensi_sholats_table', 1)
;
COMMIT;
BEGIN;
LOCK TABLE "public"."password_resets" IN SHARE MODE;
DELETE FROM "public"."password_resets";
COMMIT;
BEGIN;
LOCK TABLE "public"."personal_access_tokens" IN SHARE MODE;
DELETE FROM "public"."personal_access_tokens";
COMMIT;
BEGIN;
LOCK TABLE "public"."users" IN SHARE MODE;
DELETE FROM "public"."users";
INSERT INTO "public"."users" ("id","name","email","no_hp","profil_pict","password","is_admin","status","remember_token","created_at","updated_at") VALUES (3, 'Ahmad Al Farizi', 'ahmad@gmail.com', '081994851234', 'profil-pict/geK5L44ovJDAc4HOdtH3a8pybitaVJMBZivtqete.jpg', 'qwerty123', 'f', 1, NULL, '2023-11-28 02:01:16', '2024-01-08 02:22:41'),(1, 'Master Admin', 'admin@gmail.com', '081994854907', 'profil-pict/64o7uhuiVrWOshECQkYCF7c7xRujMMqMraSoyhN5.jpg', 'qwerty123', 't', 1, 'u0SUIo8p2Gm0uEyHLkrh8FdP4scGeWBEIsALuxZi5aKDhKlpo5F24FeqinnX', '2023-11-13 01:40:26', '2023-11-13 01:40:26'),(2, 'Muhammad Ikhsyan', 'iksan@gmail.com', '081371610786', 'profil-pict/O71QW9kzDS2EAQozUG157ChKlbsm55DLqsZ7zgQf.jpg', 'qwerty123', 'f', 0, 'NULL', '2023-11-13 01:40:26', '2023-11-13 01:40:26')
;
COMMIT;
BEGIN;
LOCK TABLE "public"."waktu_sholats" IN SHARE MODE;
DELETE FROM "public"."waktu_sholats";
COMMIT;
ALTER TABLE "absensi_sholats" ADD CONSTRAINT "absensi_sholats_pkey" PRIMARY KEY ("id");
ALTER TABLE "activities" ADD CONSTRAINT "activities_pkey" PRIMARY KEY ("id");
ALTER TABLE "admins" ADD CONSTRAINT "admins_pkey" PRIMARY KEY ("id");
ALTER TABLE "banners" ADD CONSTRAINT "banners_pkey" PRIMARY KEY ("id");
ALTER TABLE "data_ziswafs" ADD CONSTRAINT "data_ziswafs_pkey" PRIMARY KEY ("id");
ALTER TABLE "education" ADD CONSTRAINT "education_pkey" PRIMARY KEY ("id");
ALTER TABLE "failed_jobs" ADD CONSTRAINT "failed_jobs_pkey" PRIMARY KEY ("id");
ALTER TABLE "jenis_educations" ADD CONSTRAINT "jenis_educations_pkey" PRIMARY KEY ("id");
ALTER TABLE "jenis_ziswafs" ADD CONSTRAINT "jenis_ziswafs_pkey" PRIMARY KEY ("id");
ALTER TABLE "lap_keus" ADD CONSTRAINT "lap_keus_pkey" PRIMARY KEY ("id");
ALTER TABLE "masjids" ADD CONSTRAINT "masjids_pkey" PRIMARY KEY ("id");
ALTER TABLE "migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");
ALTER TABLE "password_resets" ADD CONSTRAINT "password_resets_pkey" PRIMARY KEY ("email");
ALTER TABLE "personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_pkey" PRIMARY KEY ("id");
CREATE INDEX "personal_access_tokens_tokenable_type_tokenable_id_index" ON "personal_access_tokens" USING btree (
  "tokenable_type" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST,
  "tokenable_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);
ALTER TABLE "users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");
ALTER TABLE "waktu_sholats" ADD CONSTRAINT "waktu_sholats_pkey" PRIMARY KEY ("id");
ALTER TABLE "absensi_sholats" ADD CONSTRAINT "absensi_sholats_status_sholat_check" CHECK (status_sholat::text = ANY (ARRAY['Berjamaah'::character varying, 'Sendirian'::character varying]::text[]));
ALTER TABLE "absensi_sholats" ADD CONSTRAINT "absensi_sholats_lokasi_sholat_check" CHECK (lokasi_sholat::text = ANY (ARRAY['Masjid'::character varying, 'Rumah'::character varying]::text[]));
ALTER TABLE "admins" ADD CONSTRAINT "admins_email_unique" UNIQUE ("email");
ALTER TABLE "admins" ADD CONSTRAINT "admins_no_hp_unique" UNIQUE ("no_hp");
ALTER TABLE "failed_jobs" ADD CONSTRAINT "failed_jobs_uuid_unique" UNIQUE ("uuid");
ALTER TABLE "jenis_educations" ADD CONSTRAINT "jenis_educations_jenis_edukasi_unique" UNIQUE ("jenis_edukasi");
ALTER TABLE "jenis_educations" ADD CONSTRAINT "jenis_educations_slug_unique" UNIQUE ("slug");
ALTER TABLE "jenis_ziswafs" ADD CONSTRAINT "jenis_ziswafs_jenis_ziswaf_unique" UNIQUE ("jenis_ziswaf");
ALTER TABLE "jenis_ziswafs" ADD CONSTRAINT "jenis_ziswafs_slug_unique" UNIQUE ("slug");
ALTER TABLE "personal_access_tokens" ADD CONSTRAINT "personal_access_tokens_token_unique" UNIQUE ("token");
ALTER TABLE "users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");
ALTER TABLE "users" ADD CONSTRAINT "users_no_hp_unique" UNIQUE ("no_hp");
ALTER SEQUENCE "absensi_sholats_id_seq"
OWNED BY "absensi_sholats"."id";
SELECT setval('"absensi_sholats_id_seq"', 1, false);
ALTER SEQUENCE "absensi_sholats_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "activities_id_seq"
OWNED BY "activities"."id";
SELECT setval('"activities_id_seq"', 1, false);
ALTER SEQUENCE "activities_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "admins_id_seq"
OWNED BY "admins"."id";
SELECT setval('"admins_id_seq"', 1, false);
ALTER SEQUENCE "admins_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "banners_id_seq"
OWNED BY "banners"."id";
SELECT setval('"banners_id_seq"', 1, false);
ALTER SEQUENCE "banners_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "data_ziswafs_id_seq"
OWNED BY "data_ziswafs"."id";
SELECT setval('"data_ziswafs_id_seq"', 1, false);
ALTER SEQUENCE "data_ziswafs_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "education_id_seq"
OWNED BY "education"."id";
SELECT setval('"education_id_seq"', 1, true);
ALTER SEQUENCE "education_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "failed_jobs_id_seq"
OWNED BY "failed_jobs"."id";
SELECT setval('"failed_jobs_id_seq"', 1, false);
ALTER SEQUENCE "failed_jobs_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "jenis_educations_id_seq"
OWNED BY "jenis_educations"."id";
SELECT setval('"jenis_educations_id_seq"', 1, false);
ALTER SEQUENCE "jenis_educations_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "jenis_ziswafs_id_seq"
OWNED BY "jenis_ziswafs"."id";
SELECT setval('"jenis_ziswafs_id_seq"', 1, false);
ALTER SEQUENCE "jenis_ziswafs_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "lap_keus_id_seq"
OWNED BY "lap_keus"."id";
SELECT setval('"lap_keus_id_seq"', 5, true);
ALTER SEQUENCE "lap_keus_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "masjids_id_seq"
OWNED BY "masjids"."id";
SELECT setval('"masjids_id_seq"', 1, false);
ALTER SEQUENCE "masjids_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "migrations_id_seq"
OWNED BY "migrations"."id";
SELECT setval('"migrations_id_seq"', 15, true);
ALTER SEQUENCE "migrations_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "personal_access_tokens_id_seq"
OWNED BY "personal_access_tokens"."id";
SELECT setval('"personal_access_tokens_id_seq"', 1, false);
ALTER SEQUENCE "personal_access_tokens_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "users_id_seq"
OWNED BY "users"."id";
SELECT setval('"users_id_seq"', 4, true);
ALTER SEQUENCE "users_id_seq" OWNER TO "postgres";
ALTER SEQUENCE "waktu_sholats_id_seq"
OWNED BY "waktu_sholats"."id";
SELECT setval('"waktu_sholats_id_seq"', 1, false);
ALTER SEQUENCE "waktu_sholats_id_seq" OWNER TO "postgres";
