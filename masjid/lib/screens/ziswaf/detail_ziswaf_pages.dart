import 'package:flutter/material.dart';
import 'package:masjid/flutter_flow/flutter_flow_theme.dart';
import 'package:masjid/flutter_flow/flutter_flow_widgets.dart';
import 'package:masjid/widget/_build.dart';

class DetailZiswafPages extends StatefulWidget {
  const DetailZiswafPages({super.key});

  @override
  _DetailZiswafPagesState createState() => _DetailZiswafPagesState();
}

class _DetailZiswafPagesState extends State<DetailZiswafPages> {
  @override
  Widget build(BuildContext context) {
    late final String title =
        ModalRoute.of(context)?.settings.arguments as String;
    String userDisplayName = "Ahmad";

    return Scaffold(
      appBar: AppBar(
        title: Text(
          title,
          style: FlutterFlowTheme.of(context).titleLarge.override(
                fontFamily: 'Lexend',
                color: Colors.black,
              ),
        ),
        centerTitle: true,
        backgroundColor:  const Color.fromRGBO(170, 245, 179, 1),
        elevation: 0,
      ),
      body: SafeArea(
        child: decorationBuilder(
          context,
          Padding(
            padding: const EdgeInsets.fromLTRB(16, 0, 16, 0),
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisSize: MainAxisSize.max,
              children: [
                const SizedBox(height: 06),
                Container(
                  width: MediaQuery.of(context).size.width,
                  height: 180,
                  margin: const EdgeInsetsDirectional.fromSTEB(0, 0, 0, 15),
                  decoration: BoxDecoration(
                    boxShadow: const [
                      BoxShadow(
                        blurRadius: 6,
                        color: Color(0x4B1A1F24),
                        offset: Offset(0, 2),
                      )
                    ],
                    gradient: const LinearGradient(
                      colors: [Color(0xFF00968A), Color(0xFFF2A384)],
                      stops: [0, 1],
                      begin: AlignmentDirectional(0.94, -1),
                      end: AlignmentDirectional(-0.94, 1),
                    ),
                    borderRadius: BorderRadius.circular(8),
                  ),
                  child: Column(
                    mainAxisSize: MainAxisSize.max,
                    children: [
                      Padding(
                        padding: const EdgeInsetsDirectional.fromSTEB(16, 16, 16, 0),
                        child: Row(
                          mainAxisSize: MainAxisSize.max,
                          children: [
                            Card(
                              clipBehavior: Clip.antiAliasWithSaveLayer,
                              color: FlutterFlowTheme.of(context).primary,
                              shape: RoundedRectangleBorder(
                                borderRadius: BorderRadius.circular(40),
                              ),
                              child: Padding(
                                padding: const EdgeInsets.all(2),
                                child: Container(
                                  width: 50,
                                  height: 50,
                                  clipBehavior: Clip.antiAlias,
                                  decoration: const BoxDecoration(
                                    shape: BoxShape.circle,
                                  ),
                                  child: Image.asset(
                                    'assets/images/avatar.png',
                                  ),
                                ),
                              ),
                            ),
                            Padding(
                              padding:
                                  const EdgeInsetsDirectional.fromSTEB(12, 0, 0, 0),
                              child: Column(
                                mainAxisSize: MainAxisSize.max,
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Row(
                                    mainAxisSize: MainAxisSize.max,
                                    children: [
                                      Text(
                                        'Welcome,',
                                        style: FlutterFlowTheme.of(context)
                                            .headlineSmall,
                                      ),
                                      Padding(
                                        padding: const EdgeInsetsDirectional.fromSTEB(
                                            4, 0, 0, 0),
                                        child: Text(
                                          userDisplayName,
                                          style: FlutterFlowTheme.of(context)
                                              .headlineSmall
                                              .override(
                                                fontFamily: 'Lexend',
                                                color:
                                                    FlutterFlowTheme.of(context)
                                                        .primary,
                                              ),
                                        ),
                                      ),
                                    ],
                                  ),
                                  Text(
                                    'Your account Details are below...',
                                    style:
                                        FlutterFlowTheme.of(context).bodyMedium,
                                  ),
                                ],
                              ),
                            ),
                          ],
                        ),
                      ),
                      Padding(
                        padding: const EdgeInsetsDirectional.fromSTEB(20, 12, 0, 0),
                        child: Row(
                          mainAxisSize: MainAxisSize.max,
                          children: [
                            Text(
                              'Total $title',
                              style: FlutterFlowTheme.of(context).bodyMedium,
                            ),
                            const SizedBox(width: 100),
                            Text(
                              '$title Bulan ini',
                              style: FlutterFlowTheme.of(context).bodyMedium,
                            ),
                          ],
                        ),
                      ),
                      Padding(
                        padding: const EdgeInsetsDirectional.fromSTEB(20, 0, 20, 0),
                        child: Row(
                          mainAxisSize: MainAxisSize.max,
                          children: [
                            Text(
                              '\$25,202',
                              style: FlutterFlowTheme.of(context)
                                  .displaySmall
                                  .override(
                                    fontFamily: 'Lexend',
                                    fontSize: 32,
                                  ),
                            ),
                            const SizedBox(width: 50),
                            Text(
                              '\$25,202',
                              style: FlutterFlowTheme.of(context)
                                  .displaySmall
                                  .override(
                                    fontFamily: 'Lexend',
                                    fontSize: 32,
                                  ),
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
                Center(
                  child: Text(
                    'Riwayat $title $userDisplayName',
                    style: FlutterFlowTheme.of(context).bodyLarge.override(
                          fontFamily: 'Lexend',
                          fontSize: 16,
                          fontWeight: FontWeight.bold,
                        ),
                  ),
                ),
                const SizedBox(height: 12),
                SizedBox(
                  height: MediaQuery.of(context).size.height / 3.5,
                  child: SingleChildScrollView(
                    child: Column(
                      children: List.generate(
                        10, // Change this to the number of cards you want
                        (index) => generateCard(
                          'Go Far Rewards',
                          'Income',
                          '\$50.00',
                        ),
                      ),
                    ),
                  ),
                ),
                const Spacer(),
                FFButtonWidget(
                    text: 'Ayo Ber$title',
                    onPressed: () {},
                    options: FFButtonOptions(
                      width: double.infinity,
                      height: 44.0,
                      padding: const EdgeInsetsDirectional.fromSTEB(
                          0.0, 0.0, 0.0, 0.0),
                      iconPadding: const EdgeInsetsDirectional.fromSTEB(
                          0.0, 0.0, 0.0, 0.0),
                      color: const Color(0xFF4B39EF),
                      textStyle:
                          FlutterFlowTheme.of(context).titleSmall.override(
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
                    )),
                const SizedBox(height: 16)
              ],
            ),
          ),
        ),
      ),
    );
  }

  Widget generateCard(String title, String subtitle, String amount) {
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
                    Icons.monetization_on_rounded,
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
                      title,
                      style: FlutterFlowTheme.of(context).headlineSmall,
                    ),
                    Padding(
                      padding:
                          const EdgeInsetsDirectional.fromSTEB(0.0, 4.0, 0.0, 0.0),
                      child: Text(
                        subtitle,
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
                    amount,
                    textAlign: TextAlign.end,
                    style: FlutterFlowTheme.of(context).titleSmall.override(
                          fontFamily: 'Lexend',
                          color: FlutterFlowTheme.of(context).tertiary,
                        ),
                  ),
                  Padding(
                    padding: const EdgeInsetsDirectional.fromSTEB(0.0, 4.0, 0.0, 0.0),
                    child: Text(
                      'Hello World',
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
