import 'package:flutter/material.dart';
import 'package:masjid/services/api_banner_service.dart';
import 'package:masjid/models/banner_model.dart';

class Qurbandetail extends StatefulWidget {
  const Qurbandetail({super.key});

  @override
  _QurbanPagesState createState() => _QurbanPagesState();
}

class _QurbanPagesState extends State<Qurbandetail> {
  late Future<List<BannerModel>> _apiModel;
  @override
  void initState() {
    super.initState();
    _getData();
  }

  void _getData() async {
    _apiModel = ApiBannerService.getApi();
    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: FutureBuilder<List<BannerModel>>(
        future: _apiModel,
        builder: (context, snapshot) {
          if (snapshot.connectionState == ConnectionState.waiting) {
            return const Center(
              child: CircularProgressIndicator(),
            );
          } else if (snapshot.hasError) {
            return Center(
              child: Text('Error: ${snapshot.error}'),
            );
          } else {
            List<BannerModel> apiModels = snapshot.data ?? [];
            return ListView.builder(
              itemCount: apiModels.length,
              itemBuilder: (context, index) {
                return ListTile(
                  title: Text(apiModels[index].judul),
                  subtitle: Text(apiModels[index].deskripsi),
                  // Add more details or customize based on your model structure
                );
              },
            );
          }
        },
      ),
    );
  }
}
