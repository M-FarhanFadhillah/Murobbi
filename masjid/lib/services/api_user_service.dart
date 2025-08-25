import 'dart:convert';
import 'dart:developer';
import 'package:http/http.dart' as http;
import 'package:masjid/models/user_model.dart';
import 'package:masjid/utils/api.dart';

class ApiUserServices {
  static Future<List<UserModel>> getApi() async {
    try {
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.endPoint_user);
      var response = await http.get(url);
      if (response.statusCode == 200) {
        List<UserModel> apiModel = List.from(json.decode(response.body)).map((item) => UserModel.fromJson(item)).toList();
        return apiModel;
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