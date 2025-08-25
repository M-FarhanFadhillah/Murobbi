import 'package:flutter/material.dart';
import 'dart:async';
import 'package:masjid/login/login.dart';

class SplashScreen extends StatelessWidget {
  const SplashScreen({super.key});

  @override
  Widget build(BuildContext context) {
    Future.delayed(const Duration(seconds: 2), () {
      Navigator.pushReplacement(
        context,
        MaterialPageRoute(builder: (context) => const LoginWidget()),
      );
    });
    return Scaffold(
      backgroundColor: const Color(0xffffffff),
      body: SafeArea(
        child: Container(
          margin: const EdgeInsets.all(0),
          padding: const EdgeInsets.all(0),
          width: MediaQuery.of(context).size.width,
          height: MediaQuery.of(context).size.height,
          decoration: BoxDecoration(
            color: const Color(0xFF99D399),
            shape: BoxShape.rectangle,
            borderRadius: BorderRadius.zero,
            border: Border.all(color: const Color(0x4d9e9e9e), width: 1),
          ),
          child: const Stack(
            alignment: Alignment.center,
            children: [
              ///***If you have exported images you must have to copy those images in assets/images directory.
              Image(
                image: AssetImage("assets/images/SplashScreen.png"),
                height: 250,
                width: 250,
                fit: BoxFit.cover,
              ),
            ],
          ),
        ),
      ),
    );
  }
}
