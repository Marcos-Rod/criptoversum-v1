        <script src="../libs/jquery/jquery-3.6.0.min.js"></script>
        <script src="../libs/jquery-validate/dist/jquery.validate.min.js"></script>
        <script src="../libs/jquery-validate/src/additional/accept.js"></script>
        <script src="../libs/jquery-validate/src/additional/maxsize.js"></script>
        <script src="../libs/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="./libs/DataTables/datatables.min.js"></script>
        <script src="./libs/ckeditor/ckeditor.js"></script>
        <script src="./libs/ckfinder/ckfinder.js"></script>
        <script src="./js/validate.js"></script>
        <script src="./js/user.js"></script>
        <?
        if (
            $url_seccion == 'blog_nuevo'
            || $url_seccion == 'blog_edita'
            || $url_seccion == 'news_nuevo'
            || $url_seccion == 'news_edita'
            || $url_seccion == 'podcast_nuevo'
            || $url_seccion == 'podcast_edita'
        ) {
            echo "<script>
                window.onload = function() {
                    editor = CKEDITOR.replace('body');

                    CKFinder.setupCKEditor(editor, '../../libs/ckfinder/');

                }
            </script>";
        }

        ?>
        <script>
            $(document).ready(function() {
                $('#usuarios_table').DataTable();
            });
        </script>
        </body>

        </html>