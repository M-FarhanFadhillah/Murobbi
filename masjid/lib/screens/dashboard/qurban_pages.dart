import 'package:flutter/material.dart';
import 'package:masjid/flutter_flow/flutter_flow_widgets.dart';
import '/flutter_flow/flutter_flow_theme.dart';
import 'package:masjid/widget/_build.dart';

class QurbanPages extends StatefulWidget {
  const QurbanPages({super.key});

  @override
  _QurbanPagesState createState() => _QurbanPagesState();
}

class _QurbanPagesState extends State<QurbanPages> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text(
          'Qurban',
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
          child: Column(
            mainAxisAlignment: MainAxisAlignment.start,
            crossAxisAlignment: CrossAxisAlignment.start,
            mainAxisSize: MainAxisSize.max,
            children: [
              Expanded(
                child: OrientationBuilder(
                  builder: (context, orientation) {
                    bool isPortrait = MediaQuery.of(context).orientation ==
                        Orientation.portrait;

                    return SingleChildScrollView(
                      child: Column(
                        children: [
                          Container(
                            width: MediaQuery.of(context).size.width,
                            height: isPortrait ? 180 : 240,
                            margin: const EdgeInsetsDirectional.fromSTEB(
                                0, 0, 0, 15),
                            decoration: BoxDecoration(
                              boxShadow: const [
                                BoxShadow(
                                  blurRadius: 6,
                                  color: Color(0x4B1A1F24),
                                  offset: Offset(0, 2),
                                ),
                              ],
                              gradient: const LinearGradient(
                                colors: [Color(0xFF00968A), Color(0xFFF2A384)],
                                stops: [0, 1],
                                begin: AlignmentDirectional(0.94, -1),
                                end: AlignmentDirectional(-0.94, 1),
                              ),
                              borderRadius: BorderRadius.circular(8),
                              image: const DecorationImage(
                                fit: BoxFit.fill,
                                image: AssetImage("assets/images/qurban.png"),
                              ),
                            ),
                          ),
                          Container(
                            width: MediaQuery.of(context).size.width,
                            height: 180,
                            margin: const EdgeInsetsDirectional.fromSTEB(
                                0, 0, 0, 15),
                            decoration: BoxDecoration(
                              boxShadow: const [
                                BoxShadow(
                                  blurRadius: 6,
                                  color: Color(0x4B1A1F24),
                                  offset: Offset(0, 2),
                                ),
                              ],
                              gradient: const LinearGradient(
                                colors: [Color(0xFF00968A), Color(0xFFF2A384)],
                                stops: [0, 1],
                                begin: AlignmentDirectional(0.94, -1),
                                end: AlignmentDirectional(-0.94, 1),
                              ),
                              borderRadius: BorderRadius.circular(8),
                            ),
                            child: const Column(
                              children: [
                                Expanded(
                                  child: Center(
                                    child: Text(
                                      'Jumlah Hewan Qurban Yang Terkumpul',
                                      style: TextStyle(
                                        color: Color.fromRGBO(30, 30, 30, 1.0),
                                        fontSize: 14,
                                        fontWeight: FontWeight.bold,
                                      ),
                                    ),
                                  ),
                                ),
                                Expanded(
                                  child: Row(
                                    mainAxisAlignment: MainAxisAlignment.center,
                                    crossAxisAlignment:
                                        CrossAxisAlignment.center,
                                    children: [
                                      Expanded(
                                        child: Column(
                                          children: [
                                            Center(
                                              child: Text(
                                                'Sapi',
                                                style: TextStyle(
                                                  color: Color.fromRGBO(
                                                      30, 30, 30, 1.0),
                                                  fontSize: 12,
                                                  fontWeight: FontWeight.normal,
                                                ),
                                              ),
                                            ),
                                            Center(
                                              child: Text(
                                                '5',
                                                style: TextStyle(
                                                  color: Color.fromRGBO(
                                                      30, 30, 30, 1.0),
                                                  fontSize: 12,
                                                  fontWeight: FontWeight.normal,
                                                ),
                                              ),
                                            ),
                                          ],
                                        ),
                                      ),
                                      Expanded(
                                        child: Column(
                                          children: [
                                            Center(
                                              child: Text(
                                                'Kambing',
                                                style: TextStyle(
                                                  color: Color.fromRGBO(
                                                      30, 30, 30, 1.0),
                                                  fontSize: 12,
                                                  fontWeight: FontWeight.normal,
                                                ),
                                              ),
                                            ),
                                            Center(
                                              child: Text(
                                                '12',
                                                style: TextStyle(
                                                  color: Color.fromRGBO(
                                                      30, 30, 30, 1.0),
                                                  fontSize: 12,
                                                  fontWeight: FontWeight.normal,
                                                ),
                                              ),
                                            ),
                                          ],
                                        ),
                                      ),
                                    ],
                                  ),
                                ),
                                
                                Expanded(
                                  child: Text(
                                    'Jumlah Qurban Anda Tahun Ini: 1 Sapi',
                                    style: TextStyle(
                                      color: Color.fromRGBO(30, 30, 30, 1.0),
                                      fontSize: 12,
                                      fontWeight: FontWeight.normal,
                                    ),
                                  ),
                                )
                              ],
                            ),
                          ),
                        ],
                      ),
                    );
                  },
                ),
              ),
              FFButtonWidget(
                text: 'Ayo BerQurban',
                onPressed: () {
                  Navigator.pushNamed(context, '/qurban');
                },
                options: FFButtonOptions(
                  width: double.infinity,
                  height: 44.0,
                  padding:
                      const EdgeInsetsDirectional.fromSTEB(0.0, 0.0, 0.0, 0.0),
                  iconPadding:
                      const EdgeInsetsDirectional.fromSTEB(0.0, 0.0, 0.0, 0.0),
                  color: const Color(0xFF4B39EF),
                  textStyle: FlutterFlowTheme.of(context).titleSmall.override(
                        fontFamily: 'Plus Jakarta Sans',
                        color: Colors.white,
                        fontSize: 16.0,
                        fontWeight: FontWeight.w500,
                      ),
                  elevation: 3.0,
                  borderSide: const BorderSide(
                    color: Colors.transparent,
                    width: 1.0,
                  ),
                  borderRadius: BorderRadius.circular(12.0),
                ),
              ),
              const SizedBox(height: 16)
            ],
          ),
        ),
      ),
    );
  }
}
