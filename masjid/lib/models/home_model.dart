import '/flutter_flow/flutter_flow_util.dart';
import '../screens/dashboard/home_pages.dart' show HomeWidget;
import 'package:flutter/material.dart';
import '/flutter_flow/form_field_controller.dart';

class HomeModel extends FlutterFlowModel<HomeWidget> {
  final unfocusNode = FocusNode();
  FocusNode? textFieldFocusNode;
  TextEditingController? textController;
  String? Function(BuildContext, String?)? textControllerValidator;
  String? dropDownValue;
  FormFieldController<String>? dropDownValueController;

  TabController? tabBarController;
  int get tabBarCurrentIndex =>
      tabBarController != null ? tabBarController!.index : 0;

  @override
  void initState(BuildContext context) {}

  @override
  void dispose() {
    unfocusNode.dispose();
    textFieldFocusNode?.dispose();
    textController?.dispose();
    tabBarController?.dispose();
  }

  /// Action blocks are added here.

  /// Additional helper methods are added here.
}
