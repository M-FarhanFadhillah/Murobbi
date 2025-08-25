import 'package:flutter/material.dart';
import 'package:masjid/widget/_build.dart';

class IbadahPages extends StatelessWidget {
  const IbadahPages({super.key});

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: decorationBuilder(
        context,
        const Padding(
          padding: EdgeInsets.fromLTRB(16, 16, 16, 0),
          child: SingleChildScrollView(
            child: Column(
              mainAxisAlignment: MainAxisAlignment.start,
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisSize: MainAxisSize.max,
              children: [
                Text(
                  "Ibadah",
                  textAlign: TextAlign.start,
                  overflow: TextOverflow.clip,
                  style: TextStyle(
                    fontFamily: 'poppins',
                    fontWeight: FontWeight.bold,
                    fontStyle: FontStyle.normal,
                    fontSize: 20,
                    color: Color(0xff000000),
                  ),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }
}
