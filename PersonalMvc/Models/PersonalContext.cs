using System;
using System.Collections.Generic;
using System.Data.Entity;
using System.Linq;
using System.Web;

namespace PersonalMvc.Models
{
    public class PersonalContext:DbContext
    {
        public DbSet<Personal> Personals { get; set; }
        public DbSet<Profession> Professions { get; set; }
        public DbSet<Department> Departments { get; set; }
        public DbSet<Product> Products { get; set; }
        public DbSet<Material> Materials { get; set; }
        public DbSet<TypeProduct> TypeProducts{ get; set; }
    }
}