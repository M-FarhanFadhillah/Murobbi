// import 'package:flutter/material.dart';
// import 'package:masjid/screens/dashboard.dart';
// import 'package:masjid/screens/profile/report_problem.dart';
// import 'package:masjid/screens/qurban/qurban.dart';
// import 'package:masjid/screens/splashscreen.dart';
// import 'package:masjid/screens/ziswaf/detail_ziswaf_pages.dart';
// import 'package:masjid/screens/profile/profile_pages.dart';
// import 'package:masjid/login/login.dart';
// import 'package:masjid/login/sign_up.dart';
// import 'package:masjid/navigations/qiblah_compass.dart';
// import 'package:masjid/ui/surat_page.dart';

// class AppRoutes {
//   static const String splash = '/splashscreen';
//   static const String dashboard = '/dashboard';
//   static const String zakatPage = '/zakatPage';
//   static const String profilePages = '/profilepages';
//   static const String login = '/login';
//   static const String signUp = '/signup';
//   static const String qiblat = '/qiblat';
//   static const String reportProblem = '/reportproblem';
//   static const String qurban = '/qurban';
//   static const String surat = '/surat';

//   static Map<String, WidgetBuilder> getRoutes() {
//     return {
//       splash: (context) => const SplashScreen(),
//       dashboard: (context) => const Dashboard(),
//       zakatPage: (context) => const DetailZiswafPages(),
//       profilePages: (context) => const ProfilePages(),
//       login: (context) => const LoginWidget(),
//       signUp: (context) => const SignUpWidget(),
//       qiblat: (context) => const QiblahCompass(),
//       reportProblem: (context) => const ChatPage(),
//       qurban: (context) => const Qurbandetail(),
//       surat: (context) => const SuratPage(),
//     };
//   }

//   static Route<dynamic> generateRoute(RouteSettings settings) {
//     switch (settings.name) {
//       case splash:
//         return MaterialPageRoute(builder: (_) => const SplashScreen());
//       case dashboard:
//         return MaterialPageRoute(builder: (_) => const Dashboard());
//       case zakatPage:
//         return MaterialPageRoute(builder: (_) => const DetailZiswafPages());
//       case profilePages:
//         return MaterialPageRoute(builder: (_) => const ProfilePages());
//       case login:
//         return MaterialPageRoute(builder: (_) => const LoginWidget());
//       case signUp:
//         return MaterialPageRoute(builder: (_) => const SignUpWidget());
//       case qiblat:
//         return MaterialPageRoute(builder: (_) => const QiblahCompass());
//       case reportProblem:
//         return MaterialPageRoute(builder: (_) => const ChatPage());
//       case qurban:
//         return MaterialPageRoute(builder: (_) => const Qurbandetail());
//       case surat:
//         return MaterialPageRoute(builder: (_) => const SuratPage());
//       default:
//         return MaterialPageRoute(builder: (_) => const SplashScreen());
//     }
//   }
// }
