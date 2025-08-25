import 'package:flutter/material.dart';
import 'package:fl_chart/fl_chart.dart';
import 'package:masjid/flutter_flow/flutter_flow_theme.dart';
import 'package:masjid/flutter_flow/flutter_flow_util.dart';
import 'package:masjid/models/lapkeu_model.dart';
import 'package:masjid/models/masjid_model.dart';
import 'package:masjid/services/api_lapkeu_service.dart';
import 'package:masjid/widget/_build.dart';

class KeuanganPages extends StatefulWidget {
  const KeuanganPages({super.key});

  @override
  _KeuanganPagesState createState() => _KeuanganPagesState();
}

class _KeuanganPagesState extends State<KeuanganPages> {
  String selectedValue = 'Zakat 2023 Ganjil';
  final double width = 7;
  final String id_masjid = '8';

  late Future<List<MasjidModel>> _apiMasjidModel;
  late Future<List<LapkeuModel>> _apiLapkeuModel;

  late List<BarChartGroupData> rawBarGroups;
  late List<BarChartGroupData> showingBarGroups;

  int touchedGroupIndex = -1;

  @override
  void initState() {
    super.initState();
    final barGroup1 = makeGroupData(0, 5, 12);
    final barGroup2 = makeGroupData(1, 16, 12);
    final barGroup3 = makeGroupData(2, 18, 5);
    final barGroup4 = makeGroupData(3, 20, 16);
    final barGroup5 = makeGroupData(4, 17, 6);
    final barGroup6 = makeGroupData(5, 19, 2);

    final items = [
      barGroup1,
      barGroup2,
      barGroup3,
      barGroup4,
      barGroup5,
      barGroup6,
    ];

    rawBarGroups = items;

    showingBarGroups = rawBarGroups;
    _getData(id_masjid);
  }

  void _getData(String idMasjid) async {
    // _apiMasjidModel = ApiMasjid.getApi(id_masjid);
    _apiLapkeuModel = ApiLapkeu.getApi(idMasjid);
    setState(() {});
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          'Laporan Keuangan',
          style: FlutterFlowTheme.of(context).titleLarge.override(
                fontFamily: 'Lexend',
                color: Colors.black,
              ),
        ),
        backgroundColor:  const Color.fromRGBO(170, 245, 179, 1),
        automaticallyImplyLeading: false,
        centerTitle: true,
      ),
      body: decorationBuilder(
        context,
        Padding(
          padding: const EdgeInsets.fromLTRB(16, 0, 16, 0),
          child: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisSize: MainAxisSize.max,
              children: [
                Container(
                  margin: const EdgeInsets.only(top: 10),
                  height: 20,
                  width: MediaQuery.of(context).size.width,
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.start,
                    children: [
                      const Text(
                        "Pilih Periode ZISWAF : ",
                        textAlign: TextAlign.start,
                        overflow: TextOverflow.clip,
                        style: TextStyle(
                          fontFamily: 'poppins',
                          fontWeight: FontWeight.bold,
                          fontStyle: FontStyle.normal,
                          fontSize: 14,
                          color: Color(0xff000000),
                        ),
                      ),
                      DropdownButton<String>(
                        value: selectedValue,
                        onChanged: (String? value) {
                          setState(() {
                            selectedValue = value!;
                          });
                        },
                        icon: const Icon(
                          Icons.arrow_drop_down,
                          color: Colors.black,
                        ),
                        items: [
                          "Zakat 2023 Ganjil",
                          "Infaq 2023 Ganjil",
                          "Shodaqoh 2023 Ganjil",
                          "Wakaf 2023 Ganjil"
                        ].map((String value) {
                          return DropdownMenuItem<String>(
                            value: value,
                            child: Text(
                              value,
                              style: const TextStyle(
                                fontFamily: 'poppins',
                                fontStyle: FontStyle.normal,
                                fontSize: 14,
                                color: Color(0xff000000),
                              ),
                            ),
                          );
                        }).toList(),
                      ),
                    ],
                  ),
                ),
                Container(
                  width: MediaQuery.of(context).size.width,
                  margin: const EdgeInsets.only(top: 16),
                  height: 250,
                  child: Expanded(
                    child: BarChart(
                      BarChartData(
                        maxY: 20,
                        barTouchData: BarTouchData(
                          touchTooltipData: BarTouchTooltipData(
                            tooltipBgColor: Colors.grey,
                            getTooltipItem: (a, b, c, d) => null,
                          ),
                          touchCallback: (FlTouchEvent event, response) {
                            if (response == null || response.spot == null) {
                              setState(() {
                                touchedGroupIndex = -1;
                                showingBarGroups = List.of(rawBarGroups);
                              });
                              return;
                            }

                            touchedGroupIndex =
                                response.spot!.touchedBarGroupIndex;

                            setState(() {
                              if (!event.isInterestedForInteractions) {
                                touchedGroupIndex = -1;
                                showingBarGroups = List.of(rawBarGroups);
                                return;
                              }
                              showingBarGroups = List.of(rawBarGroups);
                              if (touchedGroupIndex != -1) {
                                var sum = 0.0;
                                for (final rod
                                    in showingBarGroups[touchedGroupIndex]
                                        .barRods) {
                                  sum += rod.toY;
                                }
                                final avg = sum /
                                    showingBarGroups[touchedGroupIndex]
                                        .barRods
                                        .length;

                                showingBarGroups[touchedGroupIndex] =
                                    showingBarGroups[touchedGroupIndex]
                                        .copyWith(
                                  barRods: showingBarGroups[touchedGroupIndex]
                                      .barRods
                                      .map((rod) {
                                    return rod.copyWith(
                                        toY: avg, color: Colors.black);
                                  }).toList(),
                                );
                              }
                            });
                          },
                        ),
                        titlesData: FlTitlesData(
                          show: true,
                          rightTitles: const AxisTitles(
                            sideTitles: SideTitles(showTitles: false),
                          ),
                          topTitles: const AxisTitles(
                            sideTitles: SideTitles(showTitles: false),
                          ),
                          bottomTitles: AxisTitles(
                            sideTitles: SideTitles(
                              showTitles: true,
                              getTitlesWidget: bottomTitles,
                              reservedSize: 42,
                            ),
                          ),
                          leftTitles: AxisTitles(
                            sideTitles: SideTitles(
                              showTitles: true,
                              reservedSize: 28,
                              interval: 1,
                              getTitlesWidget: leftTitles,
                            ),
                          ),
                        ),
                        borderData: FlBorderData(
                          show: false,
                        ),
                        barGroups: showingBarGroups,
                        gridData: const FlGridData(show: false),
                      ),
                    ),
                  ),
                ),
                SizedBox(
                  height: 30,
                  width: MediaQuery.of(context).size.width,
                  child: Row(
                    mainAxisAlignment: MainAxisAlignment.spaceBetween,
                    children: [
                      const Row(
                        children: [
                          Text(
                            'M : Juta',
                            textAlign: TextAlign.start,
                            overflow: TextOverflow.clip,
                            style: TextStyle(
                              fontFamily: 'poppins',
                              fontWeight: FontWeight.bold,
                              fontStyle: FontStyle.normal,
                              fontSize: 14,
                              color: Color(0xff000000),
                            ),
                          ),
                        ],
                      ),
                      Row(
                        children: [
                          Container(
                            width: 10,
                            height: 10,
                            color: Colors.green,
                          ),
                          const SizedBox(
                            width: 5,
                          ),
                          const Text(
                            'Pemasukan',
                            textAlign: TextAlign.start,
                            overflow: TextOverflow.clip,
                            style: TextStyle(
                              fontFamily: 'poppins',
                              fontWeight: FontWeight.bold,
                              fontStyle: FontStyle.normal,
                              fontSize: 14,
                              color: Color(0xff000000),
                            ),
                          ),
                        ],
                      ),
                      Row(
                        children: [
                          Container(
                            width: 10,
                            height: 10,
                            color: Colors.red,
                          ),
                          const SizedBox(
                            width: 5,
                          ),
                          const Text(
                            'Pengeluaran',
                            textAlign: TextAlign.start,
                            overflow: TextOverflow.clip,
                            style: TextStyle(
                              fontFamily: 'poppins',
                              fontWeight: FontWeight.bold,
                              fontStyle: FontStyle.normal,
                              fontSize: 14,
                              color: Color(0xff000000),
                            ),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
                SizedBox(
                  width: MediaQuery.of(context).size.width,
                  height: MediaQuery.of(context).size.height / 2.5,
                  child: Column(
                    children: [
                      Container(
                        margin: const EdgeInsets.only(top: 10),
                        child: const Text(
                          'History Laporan Keuangan',
                          textAlign: TextAlign.start,
                          overflow: TextOverflow.clip,
                          style: TextStyle(
                            fontFamily: 'poppins',
                            fontWeight: FontWeight.bold,
                            fontStyle: FontStyle.normal,
                            fontSize: 14,
                            color: Color(0xff000000),
                          ),
                        ),
                      ),
                      Container(
                        margin: const EdgeInsets.only(top: 10),
                        height: MediaQuery.of(context).size.height / 3.5,
                        child: FutureBuilder<List<LapkeuModel>>(
                          future: _apiLapkeuModel,
                          builder: (context, snapshot) {
                            if (snapshot.connectionState ==
                                ConnectionState.waiting) {
                              return const CircularProgressIndicator(); // Tampilkan indikator loading jika data masih dimuat.
                            } else if (snapshot.hasError) {
                              return Text('Error di Fronts: ${snapshot.error}');
                            } else if (!snapshot.hasData ||
                                snapshot.data!.isEmpty) {
                              return const Text(
                                  'Tidak ada data'); // Tampilkan pesan jika tidak ada data.
                            } else {
                              return SingleChildScrollView(
                                child: Column(
                                  children: List.generate(
                                    snapshot.data!.length,
                                    (index) => generateCard(
                                      snapshot.data![index]
                                          .note, // Gantilah dengan properti yang sesuai dari LapkeuModel
                                      snapshot.data![index].date.toString(),
                                      snapshot.data![index].nominal,
                                      snapshot.data![index].cashFlow,
                                    ),
                                  ),
                                ),
                              );
                            }
                          },
                        ),
                      )
                    ],
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }

  Widget leftTitles(double value, TitleMeta meta) {
    const style = TextStyle(
      color: Color(0xff7589a2),
      fontWeight: FontWeight.bold,
      fontSize: 12,
    );
    String text;
    if (value == 0) {
      text = '1M';
    } else if (value == 10) {
      text = '5M';
    } else if (value == 19) {
      text = '10M';
    } else {
      return Container();
    }
    return SideTitleWidget(
      axisSide: meta.axisSide,
      space: 0,
      child: Text(text, style: style),
    );
  }

  Widget bottomTitles(double value, TitleMeta meta) {
    final titles = <String>['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'];

    final Widget text = Text(
      titles[value.toInt()],
      style: const TextStyle(
        color: Color(0xff7589a2),
        fontWeight: FontWeight.bold,
        fontSize: 14,
      ),
    );

    return SideTitleWidget(
      axisSide: meta.axisSide,
      space: 16, //margin top
      child: text,
    );
  }

  BarChartGroupData makeGroupData(int x, double y1, double y2) {
    return BarChartGroupData(
      barsSpace: 4,
      x: x,
      barRods: [
        BarChartRodData(
          toY: y1,
          color: Colors.green,
          width: width,
        ),
        BarChartRodData(
          toY: y2,
          color: Colors.red,
          width: width,
        ),
      ],
    );
  }

  Widget generateCard(String note, String date, String nominal, int cashFlow) {
    return Padding(
      padding: const EdgeInsetsDirectional.fromSTEB(0.0, 0.0, 0.0, 12.0),
      child: Container(
        width: MediaQuery.of(context).size.width,
        height: 70.0,
        decoration: BoxDecoration(
          color: FlutterFlowTheme.of(context).primaryBackground,
          borderRadius: BorderRadius.circular(8.0),
        ),
        child: Row(
          mainAxisSize: MainAxisSize.max,
          children: [
            Padding(
              padding: const EdgeInsetsDirectional.fromSTEB(8.0, 0.0, 0.0, 0.0),
              child: Card(
                clipBehavior: Clip.antiAliasWithSaveLayer,
                color: const Color(0x6639D2C0),
                shape: RoundedRectangleBorder(
                  borderRadius: BorderRadius.circular(40.0),
                ),
                child: Padding(
                  padding: const EdgeInsets.all(8.0),
                  child: Icon(
                    cashFlow == 1
                        ? Icons.monetization_on_rounded
                        : Icons.money_off_rounded,
                    color: FlutterFlowTheme.of(context).tertiary,
                    size: 24.0,
                  ),
                ),
              ),
            ),
            Expanded(
              child: Padding(
                padding: const EdgeInsetsDirectional.fromSTEB(12.0, 0.0, 0.0, 0.0),
                child: Column(
                  mainAxisSize: MainAxisSize.max,
                  mainAxisAlignment: MainAxisAlignment.center,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      note,
                      style: FlutterFlowTheme.of(context).headlineSmall,
                    ),
                    Padding(
                      padding:
                          const EdgeInsetsDirectional.fromSTEB(0.0, 4.0, 0.0, 0.0),
                      child: Text(
                        DateFormat('dd MMMM yyyy').format(DateTime.parse(date)),
                        style: FlutterFlowTheme.of(context).bodyMedium,
                      ),
                    ),
                  ],
                ),
              ),
            ),
            Padding(
              padding: const EdgeInsetsDirectional.fromSTEB(12.0, 0.0, 12.0, 0.0),
              child: Column(
                mainAxisSize: MainAxisSize.max,
                mainAxisAlignment: MainAxisAlignment.center,
                crossAxisAlignment: CrossAxisAlignment.end,
                children: [
                  Text(
                    nominal,
                    textAlign: TextAlign.end,
                    style: FlutterFlowTheme.of(context).titleSmall.override(
                          fontFamily: 'Lexend',
                          color: FlutterFlowTheme.of(context).tertiary,
                        ),
                  ),
                  Padding(
                    padding: const EdgeInsetsDirectional.fromSTEB(0.0, 4.0, 0.0, 0.0),
                    child: Text(
                      cashFlow == 1 ? 'Pemasukan' : 'Pengeluaran',
                      textAlign: TextAlign.end,
                      style: FlutterFlowTheme.of(context).bodyMedium.override(
                            fontFamily: 'Lexend',
                            fontSize: 12.0,
                          ),
                    ),
                  ),
                ],
              ),
            ),
          ],
        ),
      ),
    );
  }
}
