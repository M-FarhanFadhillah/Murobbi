import 'dart:io';
import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:font_awesome_flutter/font_awesome_flutter.dart';
import 'package:masjid/flutter_flow/flutter_flow_theme.dart';
import 'package:masjid/flutter_flow/flutter_flow_widgets.dart';
import 'package:masjid/widget/_build.dart';
import 'package:image_picker/image_picker.dart';
import 'package:path_provider/path_provider.dart';
import 'package:path/path.dart';
import 'package:shared_preferences/shared_preferences.dart';

class ProfilePages extends StatefulWidget {
  const ProfilePages({super.key});

  @override
  _ProfilePagesState createState() => _ProfilePagesState();
}

class _ProfilePagesState extends State<ProfilePages> {
  late SharedPreferences pref;
  late String selectedLanguage = 'Bahasa Indonesia';
  String imagePath = "assets/prototype/images/facebook-1.png";
  File? image;

  @override
  void initState() {
    super.initState();
    _loadSelectedLanguage();
  }

  Future<void> _loadSelectedLanguage() async {
    pref = await SharedPreferences.getInstance();
    setState(() {
      selectedLanguage =
          pref.getString('selectedLanguage') ?? 'Bahasa Indonesia';
    });
  }

  Future<void> _saveSelectedLanguage(String language) async {
    await pref.setString('selectedLanguage', language);
  }

  Future takePhoto(ImageSource source) async {
    try {
      final image = await ImagePicker().pickImage(source: source);
      if (image == null) return;

      final imagePermanent = await saveImagePemanently(image.path);
      setState(() => this.image = imagePermanent);
    } on PlatformException catch (e) {
      print('Failed to pick image: $e');
    }
  }

  Future<File> saveImagePemanently(String imagePath) async {
    final directory = await getApplicationDocumentsDirectory();
    final name = basename(imagePath);
    final image = File('${directory.path}/$name');

    return File(imagePath).copy(image.path);
  }

  @override
  Widget build(BuildContext context) {
    Widget languageOption(String language) {
      return SimpleDialogOption(
        onPressed: () async {
          await _saveSelectedLanguage(language);
          _loadSelectedLanguage();
          Navigator.pop(context);
        },
        child: Text(language),
      );
    }

    return Scaffold(
      appBar: AppBar(
        title: Text(
          'Profile',
          style: FlutterFlowTheme.of(context).titleLarge.override(
                fontFamily: 'Lexend',
                color: Colors.black,
              ),
        ),
        backgroundColor:  const Color.fromRGBO(170, 245, 179, 1),
        centerTitle: true,
      ),
      body: SafeArea(
        child: decorationBuilder(
          context,
          Padding(
            padding: const EdgeInsets.fromLTRB(8, 0, 8, 0),
            child: SingleChildScrollView(
              child: Column(
                children: [
                  decorationProfile(
                    context,
                    150.0,
                    Align(
                      alignment: Alignment.center,
                      child: Stack(
                        alignment: Alignment.bottomRight,
                        children: [
                          Container(
                            height: 120,
                            width: 120,
                            clipBehavior: Clip.antiAlias,
                            decoration: const BoxDecoration(
                              shape: BoxShape.circle,
                            ),
                            child: image != null
                                ? Image.file(
                                    image!,
                                    fit: BoxFit.cover,
                                  )
                                : Image(
                                    image: AssetImage(imagePath),
                                    fit: BoxFit.cover,
                                  ),
                          ),
                          Container(
                            alignment: Alignment.center,
                            width: 40,
                            height: 40,
                            decoration: const BoxDecoration(
                              color: Color(0xff3a57e8),
                              shape: BoxShape.circle,
                            ),
                            child: GestureDetector(
                              onTap: () {
                                showModalBottomSheet(
                                  context: context,
                                  builder: (BuildContext context) => Container(
                                    height: 100.0,
                                    width: double.infinity,
                                    margin: const EdgeInsets.all(20.0),
                                    child: Column(
                                      children: [
                                        const Text(
                                          "Choose Profile Photo",
                                          style: TextStyle(
                                            fontSize: 20.0,
                                          ),
                                        ),
                                        const SizedBox(
                                          height: 20.0,
                                        ),
                                        Row(
                                          mainAxisAlignment:
                                              MainAxisAlignment.center,
                                          children: [
                                            ElevatedButton.icon(
                                              onPressed: () {
                                                takePhoto(ImageSource.camera);
                                              },
                                              icon: const Icon(Icons.camera),
                                              label: const Text("Camera"),
                                            ),
                                            const SizedBox(
                                              width: 20.0,
                                            ),
                                            ElevatedButton.icon(
                                              onPressed: () {
                                                takePhoto(ImageSource.gallery);
                                              },
                                              icon: const Icon(Icons.image),
                                              label: const Text("Gallery"),
                                            ),
                                          ],
                                        ),
                                      ],
                                    ),
                                  ),
                                );
                              },
                              child: const Icon(
                                Icons.photo_camera,
                                color: Color(0xffffffff),
                                size: 20,
                              ),
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                  decorationProfile(
                    context,
                    285.0,
                    ListView(
                      padding: const EdgeInsets.fromLTRB(24, 0, 24, 0),
                      shrinkWrap: false,
                      children: [
                        const ProfileLabel(label: 'Nama', text: 'Fadhil'),
                        const ProfileLabel(
                            label: 'Email', text: 'root@root.com'),
                        const ProfileLabel(
                            label: 'Nomor Handphone', text: '08123456789'),
                        Row(
                          mainAxisAlignment: MainAxisAlignment.spaceBetween,
                          children: [
                            textBuilder('Ubah Kata Sandi', FontWeight.w500,
                                14.0, const Color.fromARGB(255, 0, 72, 144)),
                            FFButtonWidget(
                              text: 'EDIT',
                              onPressed: () {
                                showDialog(
                                  context: context,
                                  builder: (BuildContext context) {
                                    return AlertDialog(
                                      title: const Text('Change Password'),
                                      content: const Column(
                                        mainAxisSize: MainAxisSize.min,
                                        children: <Widget>[
                                          TextField(
                                            obscureText: true,
                                            decoration: InputDecoration(
                                              border: OutlineInputBorder(),
                                              labelText: 'New Password',
                                            ),
                                          )
                                        ],
                                      ),
                                      actions: <Widget>[
                                        TextButton(
                                          onPressed: () {
                                            Navigator.of(context).pop();
                                          },
                                          child: const Text('Save'),
                                        ),
                                        TextButton(
                                          onPressed: () {
                                            Navigator.of(context).pop();
                                          },
                                          child: const Text('Cancel'),
                                        ),
                                      ],
                                    );
                                  },
                                );
                              },
                              options: FFButtonOptions(
                                width: 60,
                                height: 30,
                                padding: const EdgeInsetsDirectional.fromSTEB(
                                    0.0, 0.0, 0.0, 0.0),
                                iconPadding:
                                    const EdgeInsetsDirectional.fromSTEB(
                                        0.0, 0.0, 0.0, 0.0),
                                color: const Color.fromARGB(255, 0, 128, 116),
                                textStyle: FlutterFlowTheme.of(context)
                                    .titleSmall
                                    .override(
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
                                borderRadius: BorderRadius.circular(7.0),
                              ),
                            )
                          ],
                        ),
                      ],
                    ),
                  ),
                  decorationProfile(
                    context,
                    120,
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Container(
                          margin: const EdgeInsets.only(top: 16.0, left: 24),
                          child: const Text(
                            'Koneksi',
                            style: TextStyle(
                              color: Color.fromARGB(255, 82, 82, 92),
                              fontFamily: 'Poppins',
                              fontWeight: FontWeight.w500,
                              fontSize: 16,
                            ),
                          ),
                        ),
                        Container(
                          margin: const EdgeInsets.only(
                              top: 8.0, left: 24, right: 24),
                          child: const Row(
                            mainAxisAlignment: MainAxisAlignment.spaceBetween,
                            children: [
                              FaIcon(FontAwesomeIcons.google),
                              SizedBox(width: 10),
                              Text(
                                'Google',
                                style: TextStyle(
                                  fontFamily: 'Poppins',
                                  fontWeight: FontWeight.normal,
                                  fontSize: 16,
                                  color: Color.fromARGB(255, 18, 35, 187),
                                  decoration: TextDecoration.underline,
                                ),
                              ),
                              Spacer(),
                              Text(
                                false ? 'Terhubung' : 'Tidak Terhubung',
                                style: TextStyle(
                                  fontFamily: 'Poppins',
                                  fontWeight: FontWeight.normal,
                                  fontSize: 16,
                                  color: Color.fromARGB(255, 0, 128, 116),
                                ),
                              ),
                            ],
                          ),
                        ),
                        Container(
                          margin: const EdgeInsets.only(
                              top: 8.0, left: 24, right: 24),
                          child: const Row(
                            mainAxisAlignment: MainAxisAlignment.spaceBetween,
                            children: [
                              FaIcon(FontAwesomeIcons.facebook),
                              SizedBox(width: 10),
                              Text(
                                'Facebook',
                                style: TextStyle(
                                  fontFamily: 'Poppins',
                                  fontWeight: FontWeight.normal,
                                  fontSize: 16,
                                  color: Color.fromARGB(255, 18, 35, 187),
                                  decoration: TextDecoration.underline,
                                ),
                              ),
                              Spacer(),
                              Text(
                                true ? 'Terhubung' : 'Tidak Terhubung',
                                style: TextStyle(
                                  fontFamily: 'Poppins',
                                  fontWeight: FontWeight.normal,
                                  fontSize: 16,
                                  color: Color.fromARGB(255, 0, 128, 116),
                                ),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                  ),
                  decorationProfile(
                    context,
                    90.0,
                    Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Container(
                          margin: const EdgeInsets.only(top: 16.0, left: 24),
                          child: const Text(
                            'Bahasa',
                            style: TextStyle(
                              color: Color.fromARGB(255, 82, 82, 92),
                              fontFamily: 'Poppins',
                              fontWeight: FontWeight.w500,
                              fontSize: 16,
                            ),
                          ),
                        ),
                        Container(
                          margin: const EdgeInsets.only(
                              top: 8.0, left: 24, right: 24),
                          child: Row(
                            mainAxisAlignment: MainAxisAlignment.spaceBetween,
                            children: [
                              const FaIcon(FontAwesomeIcons.language),
                              GestureDetector(
                                onTap: () {
                                  showDialog(
                                    context: context,
                                    builder: (BuildContext context) {
                                      return SimpleDialog(
                                        title: const Text('Pilih Bahasa'),
                                        children: <Widget>[
                                          languageOption('Bahasa Indonesia'),
                                          languageOption('Bahasa Inggris'),
                                          languageOption('Bahasa Arab'),
                                        ],
                                      );
                                    },
                                  );
                                },
                                child: Text(
                                  selectedLanguage,
                                  style: const TextStyle(
                                    fontFamily: 'Poppins',
                                    fontWeight: FontWeight.normal,
                                    fontSize: 16,
                                    color: Color.fromARGB(255, 18, 35, 187),
                                    decoration: TextDecoration.underline,
                                  ),
                                ),
                              ),
                            ],
                          ),
                        ),
                      ],
                    ),
                  ),
                  decorationProfile(
                    context,
                    90.0,
                    Padding(
                      padding: const EdgeInsets.fromLTRB(24, 16, 24, 16),
                      child: Column(
                        children: [
                          GestureDetector(
                            onTap: () {
                              Navigator.pushNamed(context, '/reportproblem');
                            },
                            child: Row(
                              children: [
                                const FaIcon(FontAwesomeIcons.flag),
                                Container(
                                  margin: const EdgeInsets.only(left: 16.0),
                                  child: textBuilder(
                                    'Laporkan Masalah',
                                    FontWeight.w500,
                                    16.0,
                                    const Color.fromARGB(255, 82, 82, 92),
                                  ),
                                ),
                                const Spacer(),
                                const Icon(
                                  Icons.arrow_forward_ios,
                                  color: Color.fromARGB(255, 82, 82, 92),
                                  size: 20,
                                ),
                              ],
                            ),
                          ),
                          const Spacer(),
                          GestureDetector(
                            onTap: () {
                              showDialog(
                                context: context,
                                builder: (BuildContext context) {
                                  return AlertDialog(
                                    title: const Text('Konfirmasi'),
                                    content:
                                        const Text('Anda yakin ingin keluar?'),
                                    actions: <Widget>[
                                      TextButton(
                                        onPressed: () {
                                          Navigator.of(context)
                                              .pop(); // Close the dialog
                                        },
                                        child: const Text('Batal'),
                                      ),
                                      TextButton(
                                        onPressed: () {
                                          Navigator.popUntil(context,
                                              (route) => route.isFirst);
                                        },
                                        child: const Text('Keluar'),
                                      ),
                                    ],
                                  );
                                },
                              );
                            },
                            child: Row(
                              children: [
                                // ignore: deprecated_member_use
                                const FaIcon(FontAwesomeIcons.signOutAlt),
                                Container(
                                  margin: const EdgeInsets.only(left: 16.0),
                                  child: textBuilder(
                                    'Keluar',
                                    FontWeight.w500,
                                    16.0,
                                    const Color.fromARGB(255, 82, 82, 92),
                                  ),
                                ),
                                const Spacer(),
                                const Icon(
                                  Icons.arrow_forward_ios,
                                  color: Color.fromARGB(255, 82, 82, 92),
                                  size: 20,
                                ),
                              ],
                            ),
                          )
                        ],
                      ),
                    ),
                  ),
                  const SizedBox(height: 16)
                ],
              ),
            ),
          ),
        ),
      ),
    );
  }
}

class ProfileLabel extends StatelessWidget {
  final String label;
  final String text;

  const ProfileLabel({
    super.key,
    required this.label,
    required this.text,
  });

  @override
  Widget build(BuildContext context) {
    return Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Container(
          margin: const EdgeInsets.only(top: 16.0),
          child: Text(
            label,
            style: const TextStyle(
              color: Color.fromARGB(255, 82, 82, 92),
              fontFamily: 'Poppins',
              fontWeight: FontWeight.w500,
              fontSize: 14,
            ),
          ),
        ),
        Text(
          text,
          style: const TextStyle(
            fontFamily: 'Poppins',
            fontWeight: FontWeight.bold,
            fontSize: 16,
          ),
        ),
        const Divider(color: Colors.black),
      ],
    );
  }
}

Widget decorationProfile(BuildContext context, double height, Widget child) {
  return Container(
    width: MediaQuery.of(context).size.width,
    height: height,
    margin: const EdgeInsets.only(top: 16.0),
    decoration: BoxDecoration(
      color: const Color.fromARGB(255, 130, 190, 190),
      borderRadius: BorderRadius.circular(10.0),
      boxShadow: [
        BoxShadow(
          color: Colors.black.withOpacity(0.3), // Shadow color
          blurRadius: 5, // Spread radius
          offset: const Offset(0,
              5), // Offset in the vertical direction (creates a bottom shadow)
        ),
      ],
    ),
    child: child,
  );
}
