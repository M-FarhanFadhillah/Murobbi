import 'package:masjid/models/masjid_model.dart';
import 'package:masjid/utils/api.dart';
import 'dart:developer';
import 'dart:convert';
import 'package:http/http.dart' as http;

class ApiMasjid {
  static Future<List<MasjidModel>> getApi(String idMasjid) async {
    try {
      var url = Uri.parse('${ApiConstants.baseUrl}${ApiConstants.endPoint_masjid}/8');
      var response = await http.get(url);
      if (response.statusCode == 200) {
        List<MasjidModel> apiMasjidModel = List.from(json.decode(response.body)).map((item) => MasjidModel.fromJson(item)).toList();
        return apiMasjidModel;
      } 
      else {
        throw Exception(
            'Failed to fetch data. Status code: ${response.statusCode}');
      }
    } catch (e) {
      log(e.toString());
      throw Exception('Failed to fetch data. Error: ${e.toString()}');
    }
  }
}