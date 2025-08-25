import 'dart:convert';

LapkeuModel lapkeuModelFromJson(String str) {
  final jsonData = json.decode(str);
  return LapkeuModel.fromJson(jsonData);
}

class LapkeuModel{
  final int id;
  final int masjidId;
  final int cashFlow;
  final String note;
  final DateTime date;
  final String nominal;
  final String createdAt;
  final String updatedAt;

  LapkeuModel({
    required this.id,
    required this.masjidId,
    required this.cashFlow,
    required this.note,
    required this.date,
    required this.nominal,
    required this.createdAt,
    required this.updatedAt,
  });

  factory LapkeuModel.fromJson(Map<String, dynamic> json){
    return LapkeuModel(
      id: json['id'],
      masjidId: json['masjid_id'],
      cashFlow: json['cashflow'],
      note: json['note'],
      date: DateTime.parse(json['date']),
      nominal: json['nominal'],
      createdAt: json['created_at'],
      updatedAt: json['updated_at'],
    );
  }

  factory LapkeuModel.fromMap(Map<String, dynamic> map){
    return LapkeuModel(
      id: map['id'],
      masjidId: map['masjid_id'],
      cashFlow: map['cash_flow'],
      note: map['note'],
      date: DateTime.parse(map['date']),
      nominal: map['nominal'],
      createdAt: map['created_at'],
      updatedAt: map['updated_at'],
    );
  }

  Map<String, dynamic> toJson() {
    return {
      'id': id,
      'masjid_id': masjidId,
      'cash_flow': cashFlow,
      'note': note,
      'date': date,
      'nominal': nominal,
      'created_at': createdAt,
      'updated_at': updatedAt,
    };
  }
}