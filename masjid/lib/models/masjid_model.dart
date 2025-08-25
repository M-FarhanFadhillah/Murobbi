import 'dart:convert';

MasjidModel masjidModelFromJson(String str){
  final jsonData = json.decode(str);
  return MasjidModel.fromJson(jsonData);
}

class MasjidModel{
  final int id;
  final String masjidName;
  final String masjidPict;
  final String alamat;
  final String ketuaMasjid;
  final int kapasitas;
  final int saldoAwal;
  final int kas;
  final DateTime createdAt;
  final DateTime updatedAt;

  MasjidModel({
    required this.id,
    required this.masjidName,
    required this.masjidPict,
    required this.alamat,
    required this.ketuaMasjid,
    required this.kapasitas,
    required this.saldoAwal,
    required this.kas,
    required this.createdAt,
    required this.updatedAt,
  });

  factory MasjidModel.fromJson(Map<String, dynamic> json){
    return MasjidModel(
      id: json['id'],
      masjidName: json['masjid_name'],
      masjidPict: json['masjid_pict'],
      alamat: json['alamat'],
      ketuaMasjid: json['ketua_masjid'],
      kapasitas: json['kapasitas'],
      saldoAwal: json['saldo_awal'],
      kas: json['kas'],
      createdAt: DateTime.parse(json['created_at']),
      updatedAt: DateTime.parse(json['updated_at']),
    );
  }

  factory MasjidModel.fromMap(Map<String, dynamic> map){
    return MasjidModel(
      id: map['id'],
      masjidName: map['masjid_name'],
      masjidPict: map['masjid_pict'],
      alamat: map['alamat'],
      ketuaMasjid: map['ketua_masjid'],
      kapasitas: map['kapasitas'],
      saldoAwal: map['saldo_awal'],
      kas: map['kas'],
      createdAt: DateTime.parse(map['created_at']),
      updatedAt: DateTime.parse(map['updated_at']),
    );
  }

  Map<String, dynamic> toJson(){
    return {
      'id': id,
      'masjid_name': masjidName,
      'masjid_pict': masjidPict,
      'alamat': alamat,
      'ketua_masjid': ketuaMasjid,
      'kapasitas': kapasitas,
      'saldo_awal': saldoAwal,
      'kas': kas,
      'created_at': createdAt.toIso8601String(),
      'updated_at': updatedAt.toIso8601String(),
    };
  }
}