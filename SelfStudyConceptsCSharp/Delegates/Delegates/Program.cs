using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Delegates
{

    class Program
    {
        static void Main(string[] args)
        {
            var photo = new PhotoProcessor();
            var filters = new PhotoFilters();
            Action<Photo> filterHandler = filters.ApplyBrightness;
            filterHandler += filters.ApplyContrast;
            filterHandler += RemoveRedEyeFilter;

            photo.Process("1234", filterHandler);
        }

        static void RemoveRedEyeFilter(Photo photo)
        {
            System.Console.WriteLine("Apply RemoveRedEye");
        }
    }
}
