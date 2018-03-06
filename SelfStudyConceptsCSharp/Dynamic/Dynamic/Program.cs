using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Dynamic
{
    class Program
    {
        static void Main(string[] args)
        {
            object obj = "Mark";
            Console.WriteLine(obj.GetHashCode());

            //var methodInfo = obj.GetType().GetMethod("GetHashCode");
            //methodInfo.Invoke(null, null);
            //weird

            //dynamic excelObject = "mark";
            //excelObject.Optimize();
            //fine if on runtime excelObject had an Optimize() function



            dynamic name = "Mark";
            name = 10;
            Console.WriteLine(name);

            dynamic a = 10;
            dynamic b = 5;
            var c = a + b; //c is dynamic

            int i = 5;
            dynamic d = i; //d is int on runtime
            long l = d; //dont need to cast if converting would be done with- 
            //-dynamic class' current type.

        }
    }
}
