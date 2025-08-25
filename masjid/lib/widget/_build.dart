import 'package:flutter/material.dart';

Widget decorationBuilder(BuildContext context, Widget child) {
  return Container(
    width: MediaQuery.of(context).size.width,
    height: MediaQuery.of(context).size.height,
    decoration: const BoxDecoration(
      gradient: LinearGradient(
        colors: [
          Color.fromRGBO(170, 245, 179, 1),
          Color.fromRGBO(165, 210, 238, 1),
        ],
        begin: Alignment.topLeft,
        end: Alignment.bottomLeft,
      ),
    ),
    child: child,
  );
}

Widget textBuilder(
    String text, FontWeight fontWeight, double fontSize, Color color) {
  return Text(
    text,
    style: TextStyle(
      fontFamily: 'poppins',
      fontWeight: fontWeight,
      fontSize: fontSize,
      color: color,
    ),
  );
}
