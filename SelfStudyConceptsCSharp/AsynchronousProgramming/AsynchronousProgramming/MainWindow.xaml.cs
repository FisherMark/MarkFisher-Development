using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace AsynchronousProgramming
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        private async void Button_Click(object sender, RoutedEventArgs e)
        {
            //DownloadHtml("http://msdn.microsoft.com");
            var html = await GetHtmlAsync("http://msdn.microsoft.com//en-us//");
            MessageBox.Show(html);


            //if we wanted to do some work after starting task, before ending,
            //it would look like this

            //var getHtmlTask = GetHtmlAsync("http://msdn.microsoft.com//en-us//");
            //MessageBox.Show("Waiting for the task to complete");
            //var html = await getHtmlTask;
            //MessageBox.Show(html.Substring(0, 10));
        }

        public async Task<string> GetHtmlAsync(string url)
        {
            var webClient = new WebClient();

            return await webClient.DownloadStringTaskAsync(url);
        }

        public string GetHtml(string url)
        {
            var webClient = new WebClient();

            return webClient.DownloadString(url);
        }

        public async Task DownloadHtmlAsync(string url)
        {
            var webClient = new WebClient();
            var html = await webClient.DownloadStringTaskAsync(url);

            using (var streamWriter = new StreamWriter(@"c:\projects\result.html"))
            {
                await streamWriter.WriteAsync(html);
            }
        }

        public void DownloadHtml (string url)
        {
            var webClient = new WebClient();
            var html = webClient.DownloadString(url);

            using (var streamWriter = new StreamWriter(@"c:\projects\result.html"))
            {
                streamWriter.Write(html);
            }
        }
    }
}
