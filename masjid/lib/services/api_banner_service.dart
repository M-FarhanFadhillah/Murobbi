import 'dart:developer';
import 'dart:convert';
import 'package:http/http.dart' as http;
import 'package:masjid/utils/api.dart';
import 'package:masjid/models/banner_model.dart';

class ApiBannerService {
  static Future<List<BannerModel>> getApi() async {
    try {
      var url = Uri.parse(ApiConstants.baseUrl + ApiConstants.endPoint_banner);
      var response = await http.get(url);
      if (response.statusCode == 200) {
        List<BannerModel> apiModel = List.from(json.decode(response.body)).map((item) => BannerModel.fromJson(item)).toList();
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