package dooter.trashify;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.webkit.WebView;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        //setContentView(R.layout.activity_main);
        WebView webView = new WebView(this);
        webView.loadUrl("file:///android_asset/dinner_menu.png");
        setContentView(webView);
    }
}