import 'dart:convert';

BannerModel bannerModelFromJson(String str) {
  final jsonData = json.decode(str);
  return BannerModel.fromJson(jsonData);
}

class BannerModel {
  final int id;
  final String judul;
  final String deskripsi;
  final String cover;
  final DateTime createdAt;
  final DateTime updatedAt;
  final int kategori;
  final bool status;

  BannerModel({
    required this.id,
    required this.judul,
    required this.deskripsi,
    required this.cover,
    required this.createdAt,
    required this.updatedAt,
    required this.kategori,
    required this.status,
  });

  factory BannerModel.fromJson(Map<String, dynamic> json) {
    return BannerModel(
      id: json['id'],
      judul: json['judul'],
      deskripsi: json['deskripsi'],
      cover: json['cover'],
      createdAt: DateTime.parse(json['created_at']),
      updatedAt: DateTime.parse(json['updated_at']),
      kategori: json['kategori'],
      status: json['status'],
    );
  }

  factory BannerModel.fromMap(Map<String, dynamic> map) {
    return BannerModel(
      id: map['id'],
      judul: map['judul'],
      deskripsi: map['deskripsi'],
      cover: map['cover'],
      createdAt: DateTime.parse(map['created_at']),
      updatedAt: DateTime.parse(map['updated_at']),
      kategori: map['kategori'],
      status: map['status'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'judul': judul,
      'deskripsi': deskripsi,
      'cover': cover,
      'created_at': createdAt.toIso8601String(),
      'updated_at': updatedAt.toIso8601String(),
      'kategori': kategori,
      'status': status,
    };
  }
}