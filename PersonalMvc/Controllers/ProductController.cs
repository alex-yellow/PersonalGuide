using PersonalMvc.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Data.Entity;

namespace PersonalMvc.Controllers
{
    public class ProductController : Controller
    {
        PersonalContext db = new PersonalContext();
        public ActionResult Index()
        {
            var products = db.Products.Include(p => p.Department).Include(m=>m.Material);
            return View(products.ToList());
        }
        [HttpGet]
        public ActionResult ChooseDepartment()
        {
            List<Department> departments = db.Departments.ToList();
            ViewBag.Departments = departments;
            return View();
        }
        [HttpGet]
        public ActionResult ChoosePersonal(int departmentId)
        {
            List<Personal> personals = db.Personals.Where(p => p.DepartmentId == departmentId).ToList();
            ViewBag.Personals = personals;
            if(personals.Count == 0)
            {
                ViewBag.Error = "В этом отделе нет сотрудников";
                return View("Error");
            }
            return View();
        }
    }
}