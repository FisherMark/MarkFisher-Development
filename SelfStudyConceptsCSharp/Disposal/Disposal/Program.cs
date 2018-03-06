using System;
using System.IO;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Disposal
{
    class Program
    {
        static void Main(string[] args)
        {
            try
            {
                var api = new YouTubeApi();
                var videos = api.GetVideos("Mark");

                //using (var streamReader = new StreamReader(@"c:\file.zip"))
                //{
                //    var content = streamReader.ReadToEnd();
                //}
            }
            catch (Exception ex)
            {
                Console.WriteLine(ex.Message);

                //Console.WriteLine("Sorry, an unexpected error occurred.");
            }
        }
    }
}
