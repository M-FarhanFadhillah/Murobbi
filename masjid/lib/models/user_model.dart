import 'dart:convert';

UserModel userModelFromJson(String str) => UserModel.fromJson(json.decode(str));

class UserModel{
  final int id;
  final String name;
  final String email;
  final String noHp;
  final String profilPict;

  UserModel({
    required this.id,
    required this.name,
    required this.email,
    required this.noHp,
    required this.profilPict,
  });

  factory UserModel.fromJson(Map<String, dynamic> json){
    return UserModel(
      id: json['id'],
      name: json['name'],
      email: json['email'],
      noHp: json['no_hp'],
      profilPict: json['profil_pict'],
    );
  }

  factory UserModel.fromMap(Map<String, dynamic> map){
    return UserModel(
      id: map['id'],
      name: map['name'],
      email: map['email'],
      noHp: map['no_hp'],
      profilPict: map['profil_pict'],
    );
  }

  Map<String, dynamic> toMap(){
    return {
      'id': id,
      'name': name,
      'email': email,
      'no_hp': noHp,
      'profil_pict': profilPict,
    };
  }
}