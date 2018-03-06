using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Composition
{
    class Program
    {
        static void Main(string[] args)
        {
            var logger = new Logger();
            var dbMigrator = new DbMigrator(logger);
            var installer = new Installer(logger);

            dbMigrator.Migrate();
            installer.Install();
        }
    }
}
