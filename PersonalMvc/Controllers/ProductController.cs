using PersonalMvc.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using System.Data.Entity;
using PersonalMvc.Models.ViewModels;

namespace PersonalMvc.Controllers
{
    public class ProductController : Controller
    {
        PersonalContext db = new PersonalContext();
        public ActionResult Index()
        {
            var products = db.Products.Include(p => p.Department).Include(m=>m.Material).Include(p=>p.Personal);
            var productList = new List<ProductViewModel>();
            foreach(var product in products)
            {
                var viewProduct = new ProductViewModel()
                {
                    PersonalId = product.PersonalId,
                    DepartmentId = product.DepartmentId,
                    MaterialId = product.MaterialId,
                    Name = product.Name,
                    Id = product.Id,
                    isBigSize = product.isBigSize,
                    isMilitary = product.isMilitary,
                    isSpecial = product.isSpecial,
                    Time = product.Time,
                    Count = 10//Надо заполнить
                };
                productList.Add(viewProduct);
            }
            return View(productList);
        }
        [HttpGet]
        public ActionResult ChooseDepartment()
        {
            List<Department> departments = db.Departments.ToList();
            
            return View(departments);
        }
        [HttpGet]
        public ActionResult ChoosePersonal(Product product)
        {
            List<Personal> personals = db.Personals.Where(p => p.DepartmentId == product.DepartmentId).ToList();
            ViewBag.Personals = personals;
            if(personals.Count == 0)
            {
                ViewBag.Error = "В этом отделе нет сотрудников";
                return View("Error");
            }
            return View(product);
        }
        [HttpGet]
        public ActionResult CreateName(Product product)
        {
            return View(product);
        }
        [HttpGet]
        public ActionResult ChooseMaterial(Product product)
        {
            List<Material> materials = db.Materials.ToList();
            ViewBag.Materials = materials;
            return View(product);
        }
        [HttpGet]
        public ActionResult TimeCreate(Product product)
        {
            return View(product);
        }
        [HttpGet]
        public ActionResult TypeProduct(Product product)
        {
            List<TypeProduct> types = db.TypeProducts.ToList();
            ViewBag.TypeProducts = types;
            return View(product);
        }
        [HttpGet]
        public ActionResult AddProduct(Product product)
        {
            product.Material = db.Materials.FirstOrDefault(m => m.Id == product.MaterialId);
            product.Department = db.Departments.FirstOrDefault(d => d.Id == product.DepartmentId);
            product.Personal = db.Personals.FirstOrDefault(p => p.Id == product.PersonalId);
            return View(product);
        }
        [HttpPost]
        public ActionResult Create(Product product)
        {
            db.Products.Add(product);
            db.SaveChanges();
            return RedirectToAction("Index");
        }
        [HttpGet]
        public ActionResult Delete(int id)
        {
            Product product = db.Products.Include(p => p.Personal).Include(p => p.Department).Include(m => m.Material).FirstOrDefault(p => p.Id == id);
            if (product == null)
            {
                return HttpNotFound();
            }
            return View(product);
        }
        [HttpPost, ActionName("Delete")]
        public ActionResult DeleteConfirmed(int id)
        {
            Product product = db.Products.Find(id);
            if (product == null)
            {
                return HttpNotFound();
            }
            db.Products.Remove(product);
            db.SaveChanges();
            return RedirectToAction("Index");
        }
    }
}