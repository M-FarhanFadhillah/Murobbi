import 'package:flutter/material.dart';
import 'package:masjid/screens/dashboard.dart';
import 'package:masjid/screens/profile/report_problem.dart';
import 'package:masjid/screens/qurban/qurban.dart';
import 'package:masjid/screens/splashscreen.dart';
import 'package:masjid/screens/ziswaf/detail_ziswaf_pages.dart';
import 'package:masjid/screens/profile/profile_pages.dart';
import 'package:masjid/login/login.dart';
import 'package:masjid/login/sign_up.dart';
import 'package:masjid/navigations/qiblah_compass.dart';
import 'package:masjid/bloc/ayat/ayat_bloc.dart';
import 'package:masjid/cubit/surat/surat_cubit.dart';
import 'package:masjid/data/api_service.dart';
import 'package:flutter_bloc/flutter_bloc.dart';
import 'package:flutter_screenutil/flutter_screenutil.dart';
import 'package:google_fonts/google_fonts.dart';
import 'package:http/http.dart' as http;
import 'package:masjid/ui/surat_page.dart';

void main() {
  runApp(MaterialApp(
    home: const SplashScreen(),
    routes: {
      '/dashboard': (context) => const Dashboard(),
      '/zakatPage': (context) => const DetailZiswafPages(),
      '/profilepages': (context) => const ProfilePages(),
      '/login': (context) => const LoginWidget(),
      '/signup': (context) => const SignUpWidget(),
      '/qiblat': (context) => const QiblahCompass(),
      '/reportproblem': (context) => const ChatPage(),
      '/qurban': (context) => const Qurbandetail(),
      '/surat': (context) => const SuratPage(),
    },
  ));
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    return ScreenUtilInit(
        designSize: const Size(360, 690),
        minTextAdapt: true,
        splitScreenMode: true,
        builder: (context, child) {
          return MultiBlocProvider(
            providers: [
              BlocProvider(
                create: (context) => SuratCubit(
                  ApiService(
                    client: http.Client(),
                  ),
                ),
              ),
              BlocProvider(
                create: (context) => AyatBloc(
                  ApiService(
                    client: http.Client(),
                  ),
                ),
              ),
            ],
            child: MaterialApp(
              debugShowCheckedModeBanner: false,
              title: '-',
              theme: ThemeData(
                primarySwatch: Colors.green,
                fontFamily: GoogleFonts.poppins().fontFamily,
              ),
              home: const SplashScreen(),
            ),
          );
        });
  }

  static of(BuildContext context) {}
}

// void main() {
//   runApp(const MyApp());
// }

// class MyApp extends StatelessWidget {
//   const MyApp({super.key});

//   @override
//   Widget build(BuildContext context) {
//     return ScreenUtilInit(
//         designSize: const Size(360, 690),
//         minTextAdapt: true,
//         splitScreenMode: true,
//         builder: (context, child) {
//           return MultiBlocProvider(
//             providers: [
//               BlocProvider(
//                 create: (context) => SuratCubit(
//                   ApiService(
//                     client: http.Client(),
//                   ),
//                 ),
//               ),
//               BlocProvider(
//                 create: (context) => AyatBloc(
//                   ApiService(
//                     client: http.Client(),
//                   ),
//                 ),
//               ),
//             ],
//             child: MaterialApp(
//               debugShowCheckedModeBanner: false,
//               title: 'Murobi',
//               theme: ThemeData(
//                 primarySwatch: Colors.green,
//                 fontFamily: GoogleFonts.poppins().fontFamily,
//               ),
//               home: const SuratPage(),
//             ),
//           );
//         });
//   }
// }
